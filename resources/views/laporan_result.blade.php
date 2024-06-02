@extends('main')

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1 class="text-center">LAPORAN</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active"><i class="fa fa-archive"></i></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Hasil Laporan</h3>
                    </div>
                    <div class="ml-3 mt-3">
                        <form action="{{ route('laporan.download-pdf') }}" method="GET">
                            @csrf
                            <input type="hidden" name="gudang" value="{{ request('gudang') }}">
                            <input type="hidden" name="tanggal_masuk" value="{{ request('tanggal_masuk') }}">
                            <input type="hidden" name="tanggal_keluar" value="{{ request('tanggal_keluar') }}">
                            <button type="submit" class="btn btn-primary">Download PDF</button>
                        </form>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Barang</th>
                                    <th>Gudang</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Tanggal Keluar</th>
                                    <th>Nama PIC</th>
                                    <th>Kontak PIC</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $index => $row)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $row->namabarang }}</td>
                                        <td>{{ $row->gudang->gudang }}</td>
                                        <td>{{ $row->tanggal_masuk }}</td>
                                        <td>{{ $row->tanggal_keluar }}</td>
                                        <td>{{ $row->namapic }}</td>
                                        <td>{{ $row->kontakpic }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pull-left">
                            Current Page: {{ $data->currentPage() }}<br>
                            Jumlah Data: {{ $data->total() }}<br>
                            Data perhalaman: {{ $data->perPage() }}<br>
                            {{-- <br> --}}
                        </div>
                        <div class="pull-right">
                            {{ $data->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- @section('script')
<style>
    .custom-margin {
        margin-left: 2.5rem;   /* Mengatur margin kiri sebesar 2.5rem */
        margin-top: 2.5rem;    /* Mengatur margin atas sebesar 2.5rem */
        margin-bottom: 2.5rem; /* Mengatur margin bawah sebesar 2.5rem */
    }
</style>
@endsection --}}
