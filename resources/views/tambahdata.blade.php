@extends('main')
@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1 class="text-center">TAMBAH DATA</h1>
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
                                            <h3 class="text-center">Masukkan Detail Barang</h3>
                                        </div>
                                        <hr>
                                        <form action="/insertdata" method="post">
                                            @csrf
                                            <div class="form-group has-success">
                                                <label for="cc-nama" class="control-label mb-1">Nama Barang</label>
                                                <input id="cc-nama" name="namabarang" type="text"
                                                placeholder="Masukkan  Nama Barang"
                                                    class="form-control cc-nama valid" data-val="true"
                                                    data-val-required="Masukkan Nama Barang" autocomplete="cc-nama"
                                                    aria-required="true" aria-invalid="false"
                                                    aria-describedby="cc-nama-error">

                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-nama"
                                                    data-valmsg-replace="true"></span>
                                                @error('namabarang')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="unit" class="control-label mb-1">Gudang</label>
                                                <select class="form-control select2" style="width: 100%;" name="unit" id="unit">
                                                    <option disable value>Pilih Gudang</option>
                                                    @foreach ($gud as $data)
                                                    <option value="{{ $data->id }}">{{ $data->gudang }}</option>
                                                    @endforeach
                                                </select>
                                                @error('unit')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                             </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Nama PIC</label>
                                                <input id="cc-name" name="namapic" type="text"
                                                placeholder="Masukkan Nama PIC"
                                                    class="form-control cc-name valid" data-val="true"
                                                    data-val-required="Masukkan Nama PIC" autocomplete="cc-name"
                                                    aria-required="true" aria-invalid="false"
                                                    aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name"
                                                    data-valmsg-replace="true"></span>
                                                @error('namapic')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Kontak PIC</label>
                                                <input id="cc-number" name="kontakpic" type="number"
                                                placeholder="Masukkan Kontak PIC"
                                                    class="form-control cc-number identified visa" value=""
                                                    data-val="true" data-val-required="Masukkan Kontak PIC"
                                                    data-val-cc-number="" autocomplete="cc-number">
                                                <span class="help-block" data-valmsg-for="cc-number"
                                                    data-valmsg-replace="true"></span>
                                                @error('kontakpic')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Tanggal
                                                            Masuk</label>
                                                        <input id="cc-exp" name="tanggal_masuk" type="datetime-local"
                                                            class="form-control cc-exp" value="" data-val="true"
                                                            data-val-required="Please enter the card expiration"
                                                            data-val-cc-exp="Please enter a valid month and year"
                                                            placeholder="MM / YY" autocomplete="cc-exp">
                                                        <span class="help-block" data-valmsg-for="cc-exp"
                                                            data-valmsg-replace="true"></span>
                                                        @error('tanggal_masuk')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Tanggal
                                                            Keluar</label>
                                                        <input id="cc-exp" name="tanggal_keluar" type="datetime-local"
                                                            class="form-control cc-exp" value="" data-val="true"
                                                            data-val-required="Please enter the card expiration"
                                                            data-val-cc-exp="Please enter a valid month and year"
                                                            placeholder="MM / YY" autocomplete="cc-exp">
                                                        <span class="help-block" data-valmsg-for="cc-exp"
                                                            data-valmsg-replace="true"></span>
                                                        @error('tanggal_keluar')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>


                                            <div>
                                                <button id="payment-button" type="submit"
                                                    class="btn btn-lg btn-info btn-block rounded">
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
