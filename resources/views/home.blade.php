@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h3 class="page-title">Dashboard</h3> <br>
            </div>
        </div>
    </div>
    <div class="card mt-5">
        <div class="card-body">
            <div class="mb-5">
                <center>
                    <h4>Selamat Datang Di Sistem Informasi Antrian Online ( SIANTRI ) Pada <br> Disdukcapil Sintang</h4>
                </center>
            </div>
            <div class="row">
                <!-- Column -->
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="d-flex flex-row">
                                <div class="col-3 align-self-center">
                                    <div class="round">
                                        <i class="mdi mdi-account-network"></i>
                                    </div>
                                </div>
                                <div class="col-10 align-self-center text-center">
                                    <div class="m-l-10">
                                        <h5 class="mt-0 round-inner">
                                            {{ App\Models\Laporan::where('hari', 'Senin')->get()->count() }}</h5>
                                        <p class="mb-0 text-muted">Jumlah Pengunjung Dalam Sistem <br> Hari Senin</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="d-flex flex-row">
                                <div class="col-3 align-self-center">
                                    <div class="round">
                                        <i class="mdi mdi-account-multiple-plus"></i>
                                    </div>
                                </div>
                                <div class="col-10 text-center align-self-center">
                                    <div class="m-l-10 ">
                                        <h5 class="mt-0 round-inner">
                                            {{ App\Models\Antrian::where('hari', 'Senin')->get()->count() }}</h5>
                                        <p class="mb-0 text-muted">Jumlah Pengunjung Dalam Antrian <br> Hari Senin</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="d-flex flex-row">
                                <div class="col-3 align-self-center">
                                    <div class="round">
                                        <i class="mdi mdi-account-network"></i>
                                    </div>
                                </div>
                                <div class="col-10 align-self-center text-center">
                                    <div class="m-l-10">
                                        <h5 class="mt-0 round-inner">
                                            {{ App\Models\Laporan::where('hari', 'Selasa')->get()->count() }}</h5>
                                        <p class="mb-0 text-muted">Jumlah Pengunjung Dalam Sistem <br> Hari Selasa</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="d-flex flex-row">
                                <div class="col-3 align-self-center">
                                    <div class="round">
                                        <i class="mdi mdi-account-multiple-plus"></i>
                                    </div>
                                </div>
                                <div class="col-10 text-center align-self-center">
                                    <div class="m-l-10 ">
                                        <h5 class="mt-0 round-inner">
                                            {{ App\Models\Antrian::where('hari', 'Selasa')->get()->count() }}</h5>
                                        <p class="mb-0 text-muted">Jumlah Pengunjung Dalam Antrian <br> Hari Selasa</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
            </div>
            <div class="row">
                <!-- Column -->
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="d-flex flex-row">
                                <div class="col-3 align-self-center">
                                    <div class="round">
                                        <i class="mdi mdi-account-network"></i>
                                    </div>
                                </div>
                                <div class="col-10 align-self-center text-center">
                                    <div class="m-l-10">
                                        <h5 class="mt-0 round-inner">
                                            {{ App\Models\Laporan::where('hari', 'Rabu')->get()->count() }}</h5>
                                        <p class="mb-0 text-muted">Jumlah Pengunjung Dalam Sistem <br> Hari Rabu</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="d-flex flex-row">
                                <div class="col-3 align-self-center">
                                    <div class="round">
                                        <i class="mdi mdi-account-multiple-plus"></i>
                                    </div>
                                </div>
                                <div class="col-10 text-center align-self-center">
                                    <div class="m-l-10 ">
                                        <h5 class="mt-0 round-inner">
                                            {{ App\Models\Antrian::where('hari', 'Rabu')->get()->count() }}</h5>
                                        <p class="mb-0 text-muted">Jumlah Pengunjung Dalam Antrian <br> Hari Rabu</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="d-flex flex-row">
                                <div class="col-3 align-self-center">
                                    <div class="round">
                                        <i class="mdi mdi-account-network"></i>
                                    </div>
                                </div>
                                <div class="col-10 align-self-center text-center">
                                    <div class="m-l-10">
                                        <h5 class="mt-0 round-inner">
                                            {{ App\Models\Laporan::where('hari', 'Kamis')->get()->count() }}</h5>
                                        <p class="mb-0 text-muted">Jumlah Pengunjung Dalam Sistem <br> Hari Kamis</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="d-flex flex-row">
                                <div class="col-3 align-self-center">
                                    <div class="round">
                                        <i class="mdi mdi-account-multiple-plus"></i>
                                    </div>
                                </div>
                                <div class="col-10 text-center align-self-center">
                                    <div class="m-l-10 ">
                                        <h5 class="mt-0 round-inner">
                                            {{ App\Models\Antrian::where('hari', 'Kamis')->get()->count() }}</h5>
                                        <p class="mb-0 text-muted">Jumlah Pengunjung Dalam Antrian <br> Hari Kamis</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
            </div>
            <div class="row">
                <!-- Column -->
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="d-flex flex-row">
                                <div class="col-3 align-self-center">
                                    <div class="round">
                                        <i class="mdi mdi-account-network"></i>
                                    </div>
                                </div>
                                <div class="col-10 align-self-center text-center">
                                    <div class="m-l-10">
                                        <h5 class="mt-0 round-inner">
                                            {{ App\Models\Laporan::where('hari', 'Jumat')->get()->count() }}</h5>
                                        <p class="mb-0 text-muted">Jumlah Pengunjung Dalam Sistem <br> Hari Jum'at</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="d-flex flex-row">
                                <div class="col-3 align-self-center">
                                    <div class="round">
                                        <i class="mdi mdi-account-multiple-plus"></i>
                                    </div>
                                </div>
                                <div class="col-10 text-center align-self-center">
                                    <div class="m-l-10 ">
                                        <h5 class="mt-0 round-inner">
                                            {{ App\Models\Antrian::where('hari', 'Jumat')->get()->count() }}</h5>
                                        <p class="mb-0 text-muted">Jumlah Pengunjung Dalam Antrian <br> Hari Jum'at</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-body">
            <div id="chart"></div>
        </div>
    </div>
@endsection

@section('footer')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        Highcharts.chart('chart', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Grafik Pengunjung Perminggu'
            },
            // subtitle: {
            //     text: 'Source: WorldClimate.com'
            // },
            xAxis: {
                categories: [
                    'Senin',
                    'Selasa',
                    'Rabu',
                    'Kamis',
                    'Jumat',
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Jumlah Pengunjung'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.f} Pengunjung</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Jumlah Pengunjung',
                data: [{!! json_encode($data1) !!}, {!! json_encode($data2) !!}, {!! json_encode($data3) !!},
                    {!! json_encode($data4) !!}, {!! json_encode($data5) !!}
                ]

            }]
        });

    </script>
@endsection
