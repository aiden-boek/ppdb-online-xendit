@extends('tu.layouts.app')
@push('style')
    <link href="{{ asset('sbadmin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="row mt-5">
                <div class="col-12">
                    <h1>Data Peserta PPDB</h1>
                </div>
                <div class="col-12">
                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Depan</th>
                                            <th>Nama Belakang</th>
                                            <th>NISN</th>
                                            <th>NIK</th>
                                            <th>No KK</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Tempat Lahir</th>
                                            <th>Agama</th>
                                            <th>Asal Sekolah</th>
                                            <th>Alamat</th>
                                            <th>Nama Ayah</th>
                                            <th>No Telepon Ayah</th>
                                            <th>Nama Ibu</th>
                                            <th>No Telepon Ibu</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($items as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->peserta->nama_depan }}</td>
                                                <td>{{ $item->peserta->nama_belakang }}</td>
                                                <td>{{ $item->peserta->nisn }}</td>
                                                <td>{{ $item->peserta->nik }}</td>
                                                <td>{{ $item->peserta->no_kk }}</td>
                                                <td>{{ $item->peserta->jenis_kelamin }}</td>
                                                <td>{{ $item->peserta->tanggal_lahir }}</td>
                                                <td>{{ $item->peserta->tempat_lahir }}</td>
                                                <td>{{ $item->peserta->agama }}</td>
                                                <td>{{ $item->peserta->asal_sekolah }}</td>
                                                <td>{{ $item->peserta->alamat }}</td>
                                                <td>{{ $item->orang_tua->nama_ayah }}</td>
                                                <td>{{ $item->orang_tua->no_tlp_ayah }}</td>
                                                <td>{{ $item->orang_tua->nama_ibu }}</td>
                                                <td>{{ $item->orang_tua->no_tlp_ibu }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="16">No records found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @push('script')
        <!-- Page level plugins -->
        <script src="{{ asset('sbadmin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('sbadmin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('sbadmin/js/demo/datatables-demo.js') }}"></script>
    @endpush