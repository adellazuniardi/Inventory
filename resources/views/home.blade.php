@extends('main')

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1 class="text-center">Selamat Datang {{ Auth::user()->name}}! </h1>
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
    <div class="col-sm-12 mb-4">
        <div class="card-group">
            <div class="card col-md-6 no-padding ">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-arrow-down"></i>
                    </div>
                    <div class="h4 mb-0">
                        <span class="count" style="font-size: 3rem;">{{ $barangMasukSebulan }}</span>
                    </div>
                    <hr>
                    <small class="text-muted text-uppercase font-weight-bold">Barang Masuk Bulan Ini</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 100%; height: 5px;"></div>
                </div>
            </div>
            {{-- <div class="card col-md-6 no-padding ">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-arrow-up"></i>
                    </div>
                    <div class="h4 mb-0">
                        <span class="count" style="font-size: 3rem;">{{ $barangKeluarSebulan }}</span>
                    </div>
                    <hr>
                    <small class="text-muted text-uppercase font-weight-bold">Barang Keluar Bulan Ini</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-2" style="width: 100%; height: 5px;"></div>
                </div>
            </div> --}}
            <div class="card col-md-6 no-padding ">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-arrow-down"></i>
                    </div>
                    <div class="h4 mb-0">
                        <span class="count" style="font-size: 3rem;">{{ $barangBaruMasuk }}</span>
                    </div>
                    <hr>
                    <small class="text-muted text-uppercase font-weight-bold">Barang Masuk Minggu Ini</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-3" style="width: 100%; height: 5px;"></div>
                </div>
            </div>
            {{-- <div class="card col-md-6 no-padding ">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-arrow-up"></i>
                    </div>
                    <div class="h4 mb-0">
                        <span class="count" style="font-size: 3rem;">{{ $barangAkanKeluar }}</span>
                    </div>
                    <hr>
                    <small class="text-muted text-uppercase font-weight-bold">Barang Keluar Minggu Ini</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-4" style="width: 100%; height: 5px;"></div>
                </div>
            </div> --}}
            <div class="card col-md-6 no-padding">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-cubes"></i>
                    </div>
                    <div class="h4 mb-0">
                        <span class="count" style="font-size: 3rem;">{{ $totalBarang }}</span>
                    </div>
                    <hr>
                    <small class="text-muted text-uppercase font-weight-bold">Total Barang</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-5" style="width: 100%; height: 5px;"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="clearfix">
                    <i class="fa fa-building-o bg-primary p-3 font-2xl mr-3 float-left text-light"></i>
                    <div class="h5 text-secondary mb-0 mt-1">DESKRIPSI GUDANG</div>
                    {{-- <div class="text-muted text-uppercase font-weight-bold font-xs small">Deskripsi Gudang</div> --}}
                </div>
                <div class="b-b-1 pt-3"></div>
                <hr>
                <div class="more-info pt-2" style="margin-bottom:-10px;">
                    <a class="font-weight-bold font-xs btn-block text-muted small" href="/deskindex">View More <i
                            class="fa fa-angle-right float-right font-lg"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="clearfix">
                    <i class="fa fa-archive bg-info p-3 font-2xl mr-3 float-left text-light"></i>
                    <div class="h5 text-secondary mb-0 mt-1">DATA BARANG MASUK</div>
                    {{-- <div class="text-muted text-uppercase font-weight-bold font-xs small">Income</div> --}}
                </div>
                <div class="b-b-1 pt-3"></div>
                <hr>
                <div class="more-info pt-2" style="margin-bottom:-10px;">
                    <a class="font-weight-bold font-xs btn-block text-muted small" href="/invmasuk">View More <i
                            class="fa fa-angle-right float-right font-lg"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="clearfix">
                    <i class="fa fa-archive bg-info p-3 font-2xl mr-3 float-left text-light"></i>
                    <div class="h5 text-secondary mb-0 mt-1">DATA BARANG KELUAR</div>
                    {{-- <div class="text-muted text-uppercase font-weight-bold font-xs small">Income</div> --}}
                </div>
                <div class="b-b-1 pt-3"></div>
                <hr>
                <div class="more-info pt-2" style="margin-bottom:-10px;">
                    <a class="font-weight-bold font-xs btn-block text-muted small" href="/invkeluar">View More <i
                            class="fa fa-angle-right float-right font-lg"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Row untuk Chart -->
    {{-- <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-muted">Barang Masuk dan Keluar Per Gudang</h5>
                    <canvas id="inventoryGudangChart" width="400" height="150"></canvas>
                </div>
            </div>
        </div>
    </div>
    </div> --}}

    {{-- <style>
        #inventoryGudangChart {
            display: block;
            width: 100% !important;
            height: auto !important;
        }
    </style> --}}

    {{-- <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Barang Masuk dan Keluar Per Bulan</h5>
                    <canvas id="inventoryChart" width="400" height="150"></canvas>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
{{-- @section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            var ctx = document.getElementById('inventoryGudangChart').getContext('2d');
            var inventoryGudangChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($gudangLabels) !!},
                    datasets: [{
                        label: 'Barang Masuk',
                        data: {!! json_encode($barangMasukGudang) !!},
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }, {
                        label: 'Barang Keluar',
                        data: {!! json_encode($barangKeluarGudang) !!},
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
@endsection --}}

{{-- @section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('inventoryChart').getContext('2d');
        var inventoryChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($months) !!},
                datasets: [{
                    label: 'Barang Masuk',
                    data: {!! json_encode($barangMasuk) !!},
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }, {
                    label: 'Barang Keluar',
                    data: {!! json_encode($barangKeluar) !!},
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection --}}
