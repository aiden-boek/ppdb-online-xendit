@extends('home.app')

@push('add-styles')
    <link href="{{ asset('assets/css/daftar.css') }}" rel="stylesheet">
@endpush
@section('content')
    <main id="main">
        <div class="container" style="margin-top: 150px;">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif

            <h2 class="text-center mt-5 mb-3">Tata Cara PPDB Online</h2>
            <div class="row">
                <div class="col-md-3">
                    <div class="card h-100 d-flex">
                        <div class="card-body text-center">
                            <h4>Daftar</h4>
                            <p>Calon peserta didik baru akses laman situs PPDB online</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card h-100 d-flex">
                        <div class="card-body text-center">
                            <h4>Memberikan Bukti Berkas</h4>
                            <p>Calon peserta didik mempersiapkan beberapa dokumen penting yang dibutuhkan untuk
                                memverifikasi data</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card h-100 d-flex">
                        <div class="card-body text-center">
                            <h4>Verifikasi Data</h4>
                            <p>Operator akan melakukan verifikasi pengajuan akun dan berkas secara online</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card h-100 d-flex">
                        <div class="card-body text-center">
                            <h4>Hasil</h4>
                            <p>Calon peserta didik baru akan mengecek apakah mereka telah lulus atau tidak di halaman
                                <strong>"Hasil Pendaftaran"</strong>
                            </p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="card mt-5">
                <div class="card-body">
                    <h1></h1>

                    <form method="POST" action="{{ route('daftar.kirim') }}" id="signup-form" class="signup-form"
                        enctype="multipart/form-data">
                        @csrf
                        <h3></h3>
                        <fieldset>
                            <span class="step-current"></span>
                            <h2>Biodata Calon Siswa</h2>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" name="nama" class="form-control" autocomplete="off"
                                            autofocus>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>NISN</label>
                                        <input type="number" name="nisn" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>NIK</label>
                                        <input type="number" name="nik" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nomor KK</label>
                                        <input type="number" name="no_kk" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select name="jenis_kelamin" class="form-control">
                                            <option value="laki-laki">Laki-laki</option>
                                            <option value="perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Agama</label>
                                        <select name="agama" class="form-control">
                                            <option value="islam">ISLAM</option>
                                            <option value="kristen">KRISTEN</option>
                                            <option value="hindu">HINDU</option>
                                            <option value="buddha">BUDDHA</option>
                                            <option value="khonghucu">KHONGHUCU</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input type="date" name="tanggal_lahir" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tempat Lahir</label>
                                        <input type="text" name="tempat_lahir" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Asal Sekolah</label>
                                        <input type="text" name="asal_sekolah" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea name="alamat" rows="10" class="form-control"></textarea>
                                    </div>
                                </div>
                        </fieldset>

                        <h3></h3>
                        <fieldset>
                            <span class="step-current">Step 2 / 3</span>
                            <h2>Biodata Orang Tua</h2>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Nama Orang Tua (Ayah)</label>
                                    <input type="text" name="nama_ayah" class="form-control" autocomplete="off"
                                        autofocus>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Pekerjaan Ayah</label>
                                    <select name="id_pekerjaan_ayah" class="form-control">
                                        @forelse ($pekerjaan_ortu as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_pekerjaan }}</option>
                                        @empty
                                            <option value="">NO Data</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label>No telepon ayah</label>
                                    <input type="number" name="no_telp_ayah" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Nama Orang Tua (Ibu)</label>
                                    <input type="text" name="nama_ibu" class="form-control" autocomplete="off"
                                        autofocus>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Pekerjaan Ibu</label>
                                    <select name="id_pekerjaan_ibu" class="form-control">
                                        @forelse ($pekerjaan_ortu as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_pekerjaan }}</option>
                                        @empty
                                            <option value="">NO Data</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label>No Telepon</label>
                                    <input type="number" name="no_telp_ibu" class="form-control" autocomplete="off">
                                </div>
                            </div>

                        </fieldset>

                        {{-- <h3></h3>
                        <fieldset>
                            <span class="step-current">Step 3 / 3</span>
                            <h2>Kartu Beasiswa</h2>
                            <div class="form-group">
                                <label for="nomor_kps">Nomor KPS:</label>
                                <input type="text" class="form-control" name="nomor_kps" id="nomor_kps" required>

                                <label for="nomor_kks">Nomor KKS:</label>
                                <input type="text" class="form-control" name="nomor_kks" id="nomor_kks" required>

                                <label for="nomor_kip">Nomor KIP:</label>
                                <input type="text" class="form-control" name="nomor_kip" id="nomor_kip" required>

                                <label for="nomor_pkh">Nomor PKH:</label>
                                <input type="text" class="form-control" name="nomor_pkh" id="nomor_pkh" required>
                            </div>
                        </fieldset>
 --}}
                    </form>

                </div>
            </div>
        </div>
    </main>
    <!-- End #main -->
@endsection
@push('add-scripts')
    <!-- Page level plugins -->
    <script src="{{ asset('assets/vendor/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-validation/dist/additional-methods.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-steps/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('assets/js/daftar.js') }}"></script>
@endpush
