@extends('main')
@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1 class="text-center">KATEGORI</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active"><i class="fa fa-plus-square"></i></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Kategori Gudang</strong>
                    </div>
                    @csrf
                    <div class="card-body">
                        <table class="table table-bordered ml-2 mr-2">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Gudang</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($gudd as $item)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $item->gudang }}</td>
                                        <td>
                                            {{-- <button type="button" class="btn btn-primary btn-sm rounded" data-bs-toggle="modal" data-bs-target="#editModal" data-id="{{ $item->id }}" data-name="{{ $item->gudang }}">
                                                Edit
                                            </button> --}}
                                            <a href="#" class="btn btn-primary btn-sm rounded" data-bs-toggle="modal" data-bs-target="#ModalEdit{{ $item->id }}">Edit</a>
                                            <form action="{{ route('deletecategory', $item->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm rounded" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
                                            </form>
                                            {{-- <a href="/deletecategory/{{ $item->id }}"
                                                class="btn btn-danger btn-sm rounded">Hapus</a> --}}
                                        </td>
                                        @include('editcategory')
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Tambah Category</strong>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('insertcategory') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="gudang" class="control-label mb-1">Gudang</label>
                                <input type="text" id="categoryName" name="gudang" class="form-control"
                                    placeholder="Masukkan Kategori" required>
                                @error('gudang')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm rounded">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Gudang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="POST" action="">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="editGudang" class="control-label mb-1">Gudang</label>
                        <input type="text" id="editGudang" name="gudang" class="form-control" required>
                        @error('gudang')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm rounded">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div> --}}
@endsection

