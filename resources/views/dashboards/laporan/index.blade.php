@extends('tu.layouts.app')
@push('style')
    <link href="{{ asset('sbadmin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('sbadmin/vendor/datatables/Buttons/css/buttons.bootstrap4.css') }}" rel="stylesheet">
    <link href="{{ asset('sbadmin/css/custom/scroller.css') }}" rel="stylesheet">
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
                                <table class="table table-bordered display nowrap" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>NISN</th>
                                            <th>NIK</th>
                                            <th>No KK</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Tempat Lahir</ths>
                                            <th>Agama</th>
                                            <th>Asal Sekolah</th>
                                            <th>Alamat</th>
                                            <th>Nama Ayah</th>
                                            <th>No Telepon Ayah</th>
                                            <th>Nama Ibu</th>
                                            <th>No Telepon Ibu</th>
                                            <th>Nama Wali</th>
                                            <th>No Telepon Wali</th>
                                            <th>KIP</th>
                                            <th>KKS</th>
                                            <th>KPS</th>
                                            <th>PKH</th>
                                        </tr>

                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>NISN</th>
                                            <th>NIK</th>
                                            <th>No KK</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Tempat Lahir</ths>
                                            <th>Agama</th>
                                            <th>Asal Sekolah</th>
                                            <th>Alamat</th>
                                            <th>Nama Ayah</th>
                                            <th>No Telepon Ayah</th>
                                            <th>Nama Ibu</th>
                                            <th>No Telepon Ibu</th>
                                            <th>Nama Wali</th>
                                            <th>No Telepon Wali</th>
                                            <th>KIP</th>
                                            <th>KKS</th>
                                            <th>KPS</th>
                                            <th>PKH</th>
                                        </tr>
                                    </tfoot>

                                    <tbody>
                                        @forelse ($items as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nama_depan }} {{ $item->nama_belakang }}</td>
                                                <td>{{ $item->nisn }}</td>
                                                <td>{{ $item->nik }}</td>
                                                <td>{{ $item->no_kk }}</td>
                                                <td>{{ $item->jenis_kelamin }}</td>
                                                <td>{{ date('d-m-Y', strtotime($item->tanggal_lahir)) }}</td>
                                                <td>{{ $item->tempat_lahir }}</td>
                                                <td>{{ $item->agama }}</td>
                                                <td>{{ $item->asal_sekolah }}</td>
                                                <td>{{ $item->alamat }}</td>
                                                <td>{{ $item->tbl_biodata_ortu->nama_ayah }}</td>
                                                <td>{{ $item->tbl_biodata_ortu->no_tlp_ayah }}</td>
                                                <td>{{ $item->tbl_biodata_ortu->nama_ibu }}</td>
                                                <td>{{ $item->tbl_biodata_ortu->no_tlp_ibu }}</td>
                                                <td>{{ $item->tbl_biodata_wali->nama_wali ?? ' ' }}</td>
                                                <td>{{ $item->tbl_biodata_wali->no_tlp_wali ?? ' ' }}</td>
                                                <td>{{ $item->tbl_kartu->kip ?? 'null' }}</td>
                                                <td>{{ $item->tbl_kartu->kks ?? 'null' }}</td>
                                                <td>{{ $item->tbl_kartu->kps ?? 'null' }}</td>
                                                <td>{{ $item->tbl_kartu->pkh ?? 'null' }}</td>



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
    </div>
@endsection
@push('script')
    <!-- Page level plugins -->

    <script src="{{ asset('sbadmin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('sbadmin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('sbadmin/vendor/datatables/pdfmake-0.2.7/pdfmake.min.js') }}"></script>
    <script src="{{ asset('sbadmin/vendor/datatables/pdfmake-0.2.7/vfs_fonts.js') }}"></script>
    <script src="{{ asset('sbadmin/vendor/datatables/pdfmake-0.2.7/datatables.min.js') }}"></script>
    <script src="https://cdn.datatables.net/v/bs4/jszip-3.10.1/b-2.4.2/b-html5-2.4.2/b-print-2.4.2/datatables.min.js">
    </script>
    <script src="{{ asset('sbadmin/js/demo/admin.js') }}"></script>
@endpush
