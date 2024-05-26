@extends('main')

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1 class="text-center">Tambah Detail Gudang</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active"><i class="fa fa-dashboard"></i></li>
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
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center">Masukkan Detail Gudang</h3>
                                        </div>
                                        <hr>
                                        <form action="/insertdesk" method="post" enctype="multipart/form-data">
                                            @csrf
                                            {{-- <div class="form-group has-success">
                                                <label for="nama" class="control-label mb-1">Gudang</label>
                                                <select class="form-control select2" style="width: 100%;" name="nama"
                                                    id="nama">
                                                    <option disable value>Pilih Gudang</option>
                                                    <option value>Gudang A</option>
                                                    <option value>Gudang B</option>
                                                    <option value>Gudang C</option>
                                                    <option value>Gudang D</option>
                                                </select>
                                                @error('gudang')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div> --}}
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Gudang</label>
                                                <input id="cc-name" name="nama" type="text"
                                                    placeholder="Masukkan Kapasitas Gudang" class="form-control cc-name valid"
                                                    data-val="true" data-val-required="Masukkan Nama Gudang"
                                                    autocomplete="cc-name" aria-required="true" aria-invalid="false"
                                                    aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name"
                                                    data-valmsg-replace="true"></span>
                                                @error('nama')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Kapasitas</label>
                                                <input id="cc-name" name="kapasitas" type="text"
                                                    placeholder="Masukkan Kapasitas Gudang" class="form-control cc-name valid"
                                                    data-val="true" data-val-required="Masukkan Kapasitas Gudang"
                                                    autocomplete="cc-name" aria-required="true" aria-invalid="false"
                                                    aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name"
                                                    data-valmsg-replace="true"></span>
                                                @error('kapasitas')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Deskripsi</label>
                                                <textarea id="editor" name="deskripsi" type="number"
                                                    placeholder="Masukkan Detail Gudang"
                                                    class="form-control cc-number identified visa" value=""
                                                    data-val="true" data-val-required="Masukkan Detail Gudang"
                                                    data-val-cc-number="" autocomplete="cc-number">
                                                @error('deskripsi')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </textarea>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Foto</label>
                                                <input type="file" id="cc-name" name="foto" type="text"
                                                    placeholder="Masukkan Foto Gudang" class="form-control cc-name valid"
                                                    data-val="true" data-val-required="Masukkan Kapasitas Gudang"
                                                    autocomplete="cc-name" aria-required="true" aria-invalid="false"
                                                    aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name"
                                                    data-valmsg-replace="true"></span>
                                                @error('foto')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div>
                                                <button id="payment-button" type="submit"
                                                    class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-submit fa-lg"></i>&nbsp;
                                                    <span id="payment-button-amount">SUBMIT</span>
                                                    <span id="payment-button-sending"
                                                        style="display:none;">Sending…</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endsection
            @section('ckeditor')
            <script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script>

            <script>
                ClassicEditor
                    .create( document.querySelector( '#editor' ) )
                    .catch( error => {
                        console.error( error );
                    } );
            </script>

            @endsection
