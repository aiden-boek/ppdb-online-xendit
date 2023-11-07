<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

// Load Models
use App\Models\PenghasilanOrtu;
use App\Models\PekerjaanOrtu;
use App\Models\PesertaPPDB;
use App\Models\BiodataOrtu;
use App\Models\Hasil;

class DaftarController extends Controller
{
    public function index()
    {
        $hasil_ortu = PenghasilanOrtu::all();
        $pekerjaan_ortu = PekerjaanOrtu::all();
        return view('home.pendaftaran', compact(
            'hasil_ortu',
            'pekerjaan_ortu',
        ));
    }

    public function daftar(Request $request)
    {
        DB::beginTransaction();

        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'agama' => 'required',
            'tanggal_lahir' => 'date|before:yesterday',
            'tempat_lahir' => 'required',
            'asal_sekolah' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
            'id_pekerjaan_ayah' => 'required|exists:tbl_pekerjaan_ortu,id',
            'id_pekerjaan_ibu' => 'required|exists:tbl_pekerjaan_ortu,id',
            'id_penghasilan_ayah' => 'required|exists:tbl_penghasilan_ortu,id',
            'id_penghasilan_ibu' => 'required|exists:tbl_penghasilan_ortu,id',
            'no_telp_ortu' => 'required',
            'ijasah' => 'required|file|mimes:pdf|max:2048', // PDF file, 2MB maximum
            'foto_kk' => 'required|image|mimes:jpg,jpeg,png|max:2048', // Image
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $ijasahName = '';
        if ($request->hasFile('ijasah')) {
            $ijasahName = time() . '_ijasah.' . $request->file('ijasah')->getClientOriginalExtension();
            $request->file('ijasah')->move(public_path('uploads/documents'), $ijasahName);
        }

        $fotoKkName = '';
        if ($request->hasFile('foto_kk')) {
            $fotoKkName = time() . '_foto_kk.' . $request->file('foto_kk')->getClientOriginalExtension();
            $request->file('foto_kk')->move(public_path('uploads/documents'), $fotoKkName);
        }

        $dataPeserta = [
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'tanggal_lahir' => $request->tanggal_lahir,
            'tempat_lahir' => $request->tempat_lahir,
            'asal_sekolah' => $request->asal_sekolah,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'nama_ortu' => $request->nama_ayah,
            'id_pekerjaan_ortu' => $request->id_pekerjaan_ayah,
            'id_penghasilan_ortu' => $request->id_penghasilan_ayah,
            'ijasah' => 'uploads/documents/' . $ijasahName,
            'foto_kk' => 'uploads/documents/' . $fotoKkName,
        ];

        $daftar = PesertaPPDB::create($dataPeserta);
        if (!$daftar) {
            DB::rollBack();
            Alert::error('Error', 'Please check your form again!');
            return redirect()->back();
        }

        $dataOrtu = [
            'id_peserta_ppdb' => $daftar->id,
            'id_pekerjaan_ayah' => $request->id_pekerjaan_ayah,
            'id_penghasilan_ayah' => $request->id_penghasilan_ayah,
            'id_pekerjaan_ibu' => $request->id_pekerjaan_ibu,
            'id_penghasilan_ibu' => $request->id_penghasilan_ibu,
            'nama_ayah' => $request->nama_ayah,
            'nama_ibu' => $request->nama_ibu,
            'no_tlp' => $request->no_telp_ortu
        ];

        $ortu = BiodataOrtu::create($dataOrtu);
        if (!$ortu) {
            DB::rollBack();
            Alert::error('Error', 'Please check your form again!');
            return redirect()->back();
        }
        $data3 = [
            'nis' => $daftar->id
        ];

        $hasil = Hasil::create($data3);
        if (!$hasil) {
            DB::rollBack();
            Alert::error('Error', 'Please check your form again!');
            return redirect()->back();
        }

        DB::commit();
        Alert::success('Success', 'Thank you for registering!');
        return redirect()->route('landing-page');
    }

    public function hasil()
    {
        $items = Hasil::with(['peserta.orang_tua'])->get();
        return view('home.hasil', compact('items'));
    }
}
