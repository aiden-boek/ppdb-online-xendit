<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;


// Load Models
use App\Models\TblHasil;
use App\Modules\Tus\Models\Tu;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Auth;
use App\Models\TblBiodataOrtu;


class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        // Get counts
        $counts = $this->getCounts();

        // Fetch items
        $items = TblHasil::with(['tbl_peserta_ppdb'.])->get();

        return view('dashboards.dashboard.admin.index', compact('items', 'counts'));
    }
    public function indextu()
    {
        // Get counts
        $counts = $this->getCounts();

        // Fetch items
        $items = TblHasil::with(['peserta', 'orang_tua'])->get();

        return view('dashboards.dashboard.tu.index', compact('items', 'counts'));
    }

    private function getCounts()
    {
        $counts = [
            'admin' => Tu::count(),
            'all_peserta' => TblHasil::count(),
            'menunggu_peserta' => TblHasil::where('status', 'MENUNGGU')->count(),
            'ditolak_peserta' => TblHasil::where('status', 'DITOLAK')->count(),
            'cadangan_peserta' => TblHasil::where('status', 'CADANGAN')->count(),
            'diterima_peserta' => TblHasil::where('status', 'DITERIMA')->count(),
        ];

        return $counts;
    }
    public function laporan()
    {
        $items = TblHasil::with(['peserta', 'orang_tua'])->get();

        // Count
        return view(
            'dashboards.laporan.index',
            compact(
                'items',
            )
        );
    }
    public function dataortu()
    {
        $items = TblHasil::with(['peserta', 'orang_tua'])->get();

        // Count
        return view(
            'dashboards.laporan.dataortu',
            compact(
                'items',
            )
        );
    }



    public function transaksi()
    {
        $items = Pembayaran::all();
        return view(
            'dashboards.dashboard.tu.transaksi',
            compact(
                'items',
            )
        );

    }



    public function detail($id)
    {
        $item = TblHasil::with(['peserta.orang_tua'])->where('id', $id)->first();
        return view(
            'dashboards.dashboard.admin.detail',
            compact(
                'item'
            )
        );

    }
    public function detailtu($id)
    {
        $item = TblHasil::with(['peserta.orang_tua'])->where('id', $id)->first();
        return view(
            'dashboards.dashboard.tu.detail',
            compact(
                'item'
            )
        );

    }

    public function terima($id)
    {
        $item = TblHasil::findOrFail($id);
        $item->status = 'DITERIMA';
        // Save the new Hasil's ID to the $item->id_Hasil field
        $item->update();

        // Display a success message
        Alert::success('Sukses', 'Simpan Data Sukses');
        if (Auth::guard('tu')->check()) {
            return redirect()->route('tu.dashboard');
        } elseif (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        } else {
            view()->share('guard', 'web');
        }

        // Redirect the Hasil to the 'home' route
    }

    public function tolak($id)
    {
        $item = TblHasil::findOrFail($id);

        $item->status = 'DITOLAK';
        $item->update();

        Alert::success('Sukses', 'Simpan Data Sukses');
        if (Auth::guard('tu')->check()) {
            return redirect()->route('tu.dashboard');
        } elseif (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        } else {
            view()->share('guard', 'web');
        }
    }
    public function cadangan($id)
    {
        $item = TblHasil::findOrFail($id);
        $item->status = 'CADANGAN';
        $item->update();

        Alert::success('Sukses', 'Simpan Data Sukses');
        if (Auth::guard('tu')->check()) {
            return redirect()->route('tu.dashboard');
        } elseif (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        } else {
            view()->share('guard', 'web');
        }
    }


}
