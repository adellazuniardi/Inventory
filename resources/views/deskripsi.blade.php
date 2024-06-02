@extends('main')

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1 class="text-center">MANAJEMENT GUDANG</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active"><i class="fa fa-building-o"></i></li>
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
                        <h3 class="text-center">Detail Gudang</h3>
                    </div>

                    @csrf
                    {{-- <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Table Head</strong>
                            </div> --}}
                            <div class="card-body">
                                <div class="col-lg-6 mb-2 rounded">
                                    <a href="/tambahdesk" class="btn btn-success rounded"><i class="fa fa-plus-square"></i>&nbsp; Tambah Data</a>
                                    </div>
                                <table class="table table-bordered ml-2 mr-2">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Gudang</th>
                                            <th scope="col">Kapasitas</th>
                                            <th scope="col">Deskripsi</th>
                                            <th scope="col">Foto</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($datas as $row )
                                        <tr>
                                            {{-- <th scope="row">{{ $index + $datas->firstItem() }}</th> --}}
                                            <th scope="row">{{ $no++}}</th>
                                            <td>{{ $row->gudang->gudang}}</td>
                                            <td>{{ $row->kapasitas}}</td>
                                            <td class="description-cell">{!! $row->deskripsi!!}</td>
                                            <td>
                                                {{-- <img src="{{asset('fotopegawai/'.$row->foto)}}" alt="" heigth="10%" width="50%" style="100px"> --}}
                                                <a href="{{asset('fotopegawai/'.$row->foto)}}" target="_blank" rel="noopener noreeferrer">Lihat Foto</a>
                                            </td>
                                                <td>
                                                    <a href="/editdesk/{{ $row->id }}" class="btn btn-primary rounded">Edit</a>

                                                    <a href="/deletedesk/{{ $row->id }}" class="btn btn-danger rounded">Hapus</a>
                                                </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="pull-left ml-2">
                                    Current Page: {{ $datas->currentPage() }}<br>
                                    Jumlah Data: {{ $datas->total() }}<br>
                                    Data perhalaman: {{ $datas->perPage() }}<br>
                                    <br>
                                    {{ $datas->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
@endsection
@section('css')
<style>
    table.table {
        width: 100%;
        table-layout: fixed; /* Make table cells have fixed width */
    }

    table.table th, table.table td {
        word-wrap: break-word; /* Ensure long words break and wrap to next line */
        overflow-wrap: break-word; /* Alternative property for better support */
        white-space: normal; /* Allow line breaks within words */
    }

    .description-cell {
        white-space: normal; /* Allows text wrapping for the description cell */
        word-wrap: break-word; /* Ensures long words break and wrap to the next line */
        overflow-wrap: break-word; /* Better support across browsers */
    }
</style>
@endsection
