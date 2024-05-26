@extends('main')

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1 class="text-center">MANAJEMENT INVENTORY</h1>
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
                        <h3 class="text-center">Data Gudang</h3>
                    </div>
                    @csrf
                    <div class="card-body">
                        <div class="row mb-2 ml-0">
                            <div class="col-auto">
                                <form action="{{ route('inventory.index') }}" method="GET">
                                    <div class="form-group row">
                                        {{-- <label for="Filter" class="col-md-2 col-form-label text-md-right">Gudang</label> --}}
                                        <div class="col-auto">
                                            <select id="gudang" class="form-control" name="gudang">
                                                <option disable value>Gudang</option>
                                                @foreach ($gud as $item)
                                                    <option
                                                        value="{{ $item->id }}"{{ old('gudang') == $item->gudang ? 'selected' : '' }}>
                                                        {{ $item->gudang }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-info mr-1 rounded">Filter</button>
                                        <a href="{{ route('inventory.index') }}" class="btn btn-secondary rounded">Reset</a>
                                    </div>
                                </form>
                            </div>

                            <div class="col-auto">
                                <div class="form-group">
                                    <form action="/inventory" method="get">
                                        <div class="input-group">
                                            <input type="search" class="form-control" name="search" id=""
                                                placeholder="Cari Barang">
                                            <button type="submit" class="btn btn-secondary rounded ml-2"><i
                                                    class="fa fa-search"></i></button>
                                            {{-- <div class="input-group-addon"><i class="fa fa-search"></i></div> --}}
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-auto">
                                <table class="table table-bordered ml-1 mr-2">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nama Barang</th>
                                            <th scope="col">Gudang</th>
                                            <th scope="col">Tanggal Masuk</th>
                                            <th scope="col">Tanggal Keluar</th>
                                            <th scope="col">Nama PIC</th>
                                            <th scope="col">Kontak PIC</th>
                                            <th scope="col">Aksi</th>
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
                                                <td>{{ $row->tanggal_masuk }}</td>
                                                <td>{{ $row->tanggal_keluar }}</td>
                                                <td>{{ $row->namapic }}</td>
                                                <td>0{{ $row->kontakpic }}</td>
                                                <td>
                                                    <a href="/editdata/{{ $row->id }}"
                                                        class="btn btn-primary rounded">Edit</a>

                                                    <a href="/deletedata/{{ $row->id }}"
                                                        class="btn btn-danger rounded">Hapus</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="pull-left ml-2">
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
        </div>
    </div>
    </div>
    </div>
    @include('sweetalert::alert')
@endsection
