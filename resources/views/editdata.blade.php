@extends('main')
@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1 class="text-center">EDIT DATA</h1>
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
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div id="pay-invoice">
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center">Edit Detail Barang</h3>
                                </div>
                                <hr>
                                    <form action="/updatedata/{{ $data->id }}" method="post" >
                                        @csrf
                                        <div class="form-group has-success">
                                            <label for="cc-nama" class="control-label mb-1">Nama Barang</label>
                                            <input id="cc-nama" name="namabarang" type="text"
                                                class="form-control cc-nama valid" data-val="true"
                                                data-val-required="Masukkan Nama Barang" autocomplete="cc-nama" aria-required="true" aria-invalid="false" aria-describedby="cc-nama-error"
                                                value="{{ $data->namabarang }}" autofocus>
                                            <span class="help-block field-validation-valid" data-valmsg-for="cc-nama"
                                                data-valmsg-replace="true"></span>
                                                @error('namabarang')
                                                    <div
                                                        class="sufee-alert alert with-close alert-danger alert-dismissible fade show mt-2">
                                                        {{-- <span class="badge badge-pill badge-danger">Error</span> --}}
                                                        {{ $message }}
                                                        <button type="button" class="close" data-dismiss="alert"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                @enderror
                                        </div>
                                        <div class="form-group has-success">
                                            <label for="cc-gudang_inv" class="control-label mb-1">Gudang</label>
                                            <select name="gudang_inv" id="id" class="form-control">
                                                {{-- <option value="{{ $data->gudang_inv }}">{{ $data->gudang->gudang }}</option> --}}
                                                <option disable value>Pilih Gudang</option>
                                                @foreach ($gud as $item)
                                                <option value="{{ $item->id }}" {{ $item->id == $data->gudang_inv ? 'selected' : '' }}>
                                                    {{ $item->gudang }}
                                                </option>
                                                @endforeach
                                            </select>
                                            <span class="help-block field-validation-valid" data-valmsg-for="cc-gudang_inv"></span>
                                        </div>
                                       <div class="form-group has-success">
                                            <label for="cc-name" class="control-label mb-1">Nama PIC</label>
                                            <input id="cc-name" name="namapic" type="text"
                                                class="form-control cc-name valid" data-val="true"
                                                value="{{ old('namapic', $data->namapic ) }}">
                                                {{-- value="{{old('namapic', $data->namapic) }}" --}}
                                                @error('namapic')
                                                <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show mt-2">
                                                    {{ $message }}
                                                    <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="cc-number" class="control-label mb-1">Kontak PIC</label>
                                            <input id="cc-number" name="kontakpic" type="number"
                                                class="form-control cc-number identified visa"
                                                value="{{ $data->kontakpic }}">
                                            <span class="help-block" data-valmsg-for="cc-number"
                                                data-valmsg-replace="true"></span>
                                                @error('kontakpic')
                                                    <div
                                                        class="sufee-alert alert with-close alert-danger alert-dismissible fade show mt-2">
                                                        {{-- <span class="badge badge-pill badge-danger">Error</span> --}}
                                                        {{ $message }}
                                                        <button type="button" class="close" data-dismiss="alert"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                @enderror
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="cc-exp" class="control-label mb-1">Tanggal Masuk</label>
                                                    <input id="cc-exp" name="tanggal_masuk" type="datetime-local"
                                                        class="form-control cc-exp"
                                                        value="{{ $data->tanggal_masuk }}"
                                                        data-val="true"
                                                        data-val-required="Please enter the card expiration"
                                                        data-val-cc-exp="Please enter a valid month and year"
                                                        placeholder="MM / YY" autocomplete="cc-exp">
                                                    <span class="help-block" data-valmsg-for="cc-exp"
                                                        data-valmsg-replace="true"></span>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="cc-exp" class="control-label mb-1">Tanggal Keluar</label>
                                                    <input id="cc-exp" name="tanggal_keluar" type="datetime-local"
                                                        class="form-control cc-exp"
                                                        value="{{ $data->tanggal_keluar }}"
                                                        data-val="true"
                                                        data-val-required="Please enter the card expiration"
                                                        data-val-cc-exp="Please enter a valid month and year"
                                                        placeholder="MM / YY" autocomplete="cc-exp">
                                                    <span class="help-block" data-valmsg-for="cc-exp"
                                                        data-valmsg-replace="true"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <button id="payment-button" type="submit"
                                                class="btn btn-lg btn-info btn-block">
                                                <i class="fa fa-submit fa-lg"></i>&nbsp;
                                                <span id="payment-button-amount">SUBMIT</span>
                                                <span id="payment-button-sending" style="display:none;">Sending…</span>
                                            </button>
                                            <a href="/inventory" class="btn btn-secondary btn-lg btn-block">CANCEL</a>
                                        </div>
                                </form>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
