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
                        <li class="active"><i class="fa fa-th"></i></li>
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
                                                <button type="button" class="btn btn-primary btn-sm rounded" data-toggle="modal" data-target="#editModal"
                                                 onclick="editItem({{ json_encode($item) }})">Edit</button>
                                                <button onclick="confirmDelete('{{ route('deletecategory', $item->id) }}')" class="btn btn-danger btn-sm rounded">Delete</button>
                                            </td>
                                            @include('editcategory')
                                            @include('sweetalert::alert')
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
                                    {{-- <label for="gudang" class="control-label mb-1">Gudang</label> --}}
                                    <input type="text" id="categoryName" name="gudang" class="form-control"
                                        placeholder="Masukkan Kategori Gudang" required>
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

     <!-- Modal Structure -->
     <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editForm" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            {{-- <label for="gudang">Gudang</label> --}}
                            <input type="text" id="gudang" name="gudang" class="form-control" required>
                        </div>
                        <!-- Add more fields as needed -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary rounded" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary rounded">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
    function editItem(item) {
        document.getElementById('gudang').value = item.gudang; // Adjust according to your item structure
        var form = document.getElementById('editForm');
        form.action = '{{ url("updatecategory") }}' + '/' + item.id; // Adjust the URL as needed
    }
    </script>
@endsection
