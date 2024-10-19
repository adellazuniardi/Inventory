@extends('main')

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1 class="text-center">INVENTORY</h1>
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
                    <h3 class="text-center">Data Barang Keluar</h3>
                </div>
                @csrf
                <div class="card-body">
                    <div class="row mb-2 ml-1 mt-2">
                        <div class="col-auto">
                            <form action="{{ route('invkeluar') }}" method="GET">
                                <div class="form-group row">
                                    <div class="col-auto">
                                        <select id="gudang" class="form-control" name="gudang">
                                            <option disable hidden>Gudang</option>
                                            @foreach ($gud as $item)
                                                <option value="{{ $item->id }}"{{ old('gudang') == $item->gudang ? 'selected' : '' }}>
                                                    {{ $item->gudang }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-info mr-1 rounded">Filter</button>
                                    <a href="{{ route('invkeluar') }}" class="btn btn-secondary rounded">Reset</a>
                                </div>
                            </form>
                        </div>
                        <div class="col-auto">
                            <div class="form-group">
                                <form action="/invkeluar" method="get">
                                    <div class="input-group">
                                        <input type="search" class="form-control" name="search" id="" placeholder="Cari Barang">
                                        {{-- <button type="submit" class="btn btn-secondary rounded ml-2"><i class="fa fa-search"></i></button> --}}
                                        {{-- <div class="input-group-addon"><i class="fa fa-search"></i></div> --}}
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Gudang</th>
                                <th scope="col">Tanggal Keluar</th>
                                <th scope="col">Nama PIC</th>
                                <th scope="col">Kontak PIC</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($data as $index => $row)
                                <tr>
                                    <th scope="row">{{ $index + $data->firstItem() }}</th>
                                    <td>{{ $row->namabarang }}</td>
                                    <td>{{ $row->gudang->gudang }}</td>
                                    <td>{{ \Carbon\Carbon::parse($row->tanggal_keluar)->format('d/m/Y') }}</td>
                                    <td>{{ $row->namapic }}</td>
                                    <td>0{{ $row->kontakpic }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                    <div class="d-flex justify-content-between ml-2">
                        <div>
                            Current Page: {{ $data->currentPage() }}<br>
                            Jumlah Data: {{ $data->total() }}<br>
                            Data per halaman: {{ $data->perPage() }}<br>
                        </div>
                        <div class="d-flex justify-content-end">
                            {{ $data->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('sweetalert::alert')
@endsection
