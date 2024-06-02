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
                        <li class="active"><i class="fa fa-book"></i></li>
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
                    <h3 class="text-center">Generate Laporan</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('laporan.generate') }}" method="GET">
                        @csrf
                        <div class="form-group row">
                            <label for="gudang" class="col-md-2 col-form-label text-md-right">Gudang</label>
                            <div class="col-md-6">
                                <select id="gudang" class="form-control" name="gudang">
                                <option disable hidden>Pilih Gudang</option>
                                    <option value="">Semua Gudang</option>
                                    @foreach ($gud as $item)
                                        <option value="{{ $item->id }}">{{ $item->gudang }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggal_masuk" class="col-md-2 col-form-label text-md-right">Tanggal Masuk</label>
                            <div class="col-md-6">
                                <input type="date" id="tanggal_masuk" class="form-control" name="tanggal_masuk" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggal_keluar" class="col-md-2 col-form-label text-md-right">Tanggal Keluar</label>
                            <div class="col-md-6">
                                <input type="date" id="tanggal_keluar" class="form-control" name="tanggal_keluar" required>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-2">
                                <button type="submit" class="btn btn-primary btn-rounded">
                                    Generate Laporan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



