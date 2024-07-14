@extends('main')

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1 class="text-center">MASTER USER</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active"><i class="fa fa-users"></i></li>
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
                <div class="col-md-12">
                    <div class="card">
                        {{-- <div class="card-header">
                            <strong class="card-title">Users</strong>
                            <a href="{{ route('users.create') }}" class="btn btn-primary pull-right">Add User</a>
                        </div> --}}
                        <div class="card-body">
                            <table class="table table-striped table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Email</th>
                                        <th colspan="2">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                            $no = 1;
                                        @endphp
                                    @foreach ($users as $user)
                                        <tr>
                                            {{-- <th scope="user">{{     $user->firstItem() }}</th> --}}
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @if ($user->role !== 'admin')
                                                <form action="{{ route('users.makeAdmin', $user->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-info btn-sm rounded">Make Admin</button>
                                                </form>
                                            @else
                                                <form action="{{ route('users.demoteAdmin', $user->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary btn-sm rounded">Demote to Karyawan</button>
                                                </form>
                                                @endif
                                            </td>
                                            <td>
                                                <button onclick="confirmDelete('{{ route('users.destroy', $user->id) }}')"
                                                    class="btn btn-danger btn-sm rounded">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-between">
                                <div>
                                    Current Page: {{ $users->currentPage() }}<br>
                                    Jumlah Data: {{ $users->total() }}<br>
                                    Data per halaman: {{ $users->perPage() }}<br>
                                </div>
                                <div>
                                    {{ $users->links() }}
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
