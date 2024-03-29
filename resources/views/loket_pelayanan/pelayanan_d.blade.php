@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">Loket Pelayanan D</h4>
                <form action="">
                    <div class="form-group"></div>
                </form>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <form action="{{ url('/pelayanan/lanjut/d') }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-md m-l-15 m-b-15"><i
                                class="mdi mdi-skip-next-circle"></i>
                            Mulai/Lanjut</button> <br>
                    </form>
                    <form action="{{ url('/pelayanan_d') }}" method="GET">
                        <div class="row pull-right input-group mb-2 col-md-3">
                            <input type="number" name="cari" id="cari" class="form-control" aria-label="Search"
                                placeholder="Cari No Antrian .. (Hanya Angka No Antrian)">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit">Cari</button>
                            </div>
                        </div>
                    </form>
                    <div id="result">
                        <table id="" class="table">
                            <!-- Modal -->
                            <div class="modal fade" id="mulai_lanjut" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Pelayanan Loket D</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ url('/pelayanan/lanjut/d') }}" method="post">
                                                @csrf
                                                <center>
                                                    @if ($data->count() >= 9)
                                                        <h2>
                                                            C{{ App\Models\Antrian::where('id_pelayanan', 4)->first()->no_antrian + 1 }}

                                                        </h2>
                                                    @else
                                                        <h2>
                                                            @if (App\Models\Antrian::where('id_pelayanan', 4)->get()->count() <= 1)
                                                                -
                                                            @else
                                                                @if (App\Models\Antrian::where('id_pelayanan', 4)->first()->no_antrian >= 9)
                                                                    D{{ App\Models\Antrian::where('id_pelayanan', 4)->first()->no_antrian + 1 }}
                                                                @else
                                                                    D0{{ App\Models\Antrian::where('id_pelayanan', 4)->first()->no_antrian + 1 }}
                                                                @endif
                                                            @endif
                                                        </h2>
                                                    @endif
                                                </center>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Tutup</button>
                                            @if ($data->count() < 1)
                                                <button type="submit" id="selesai" class="btn btn-primary">Mulai</button>
                                            @else
                                                <button type="submit" id="selesai" class="btn btn-primary">Lanjut</button>
                                            @endif
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <thead class="thead-dark">
                                <tr>
                                    <th>No Antrian</th>
                                    <th>Estimasi Waktu Tunggu</th>
                                </tr>
                            </thead>

                            @foreach ($data as $datas)
                                <tbody>
                                    <tr>
                                        @if ($datas->no_antrian >= 10)
                                            <td>{{ 'D' . $datas->no_antrian }}</td>
                                        @else
                                            <td>{{ 'D0' . $datas->no_antrian }}</td>
                                        @endif
                                        {{-- <td id="antri{{ $datas->id }}"></td> --}}
                                        <td>
                                            @if ($datas->estimasi <= $localtime)
                                                Sedang Dalam Pelayanan
                                            @else
                                                {{ 'Akan Dilayani Pada Pukul ' . $datas->estimasi . ' Wib' }}
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                    <div class="">
                        Menampilkan
                        {{ $data->firstItem() }}
                        sampai
                        {{ $data->lastItem() }}
                        dari
                        {{ $data->total() }}
                        data
                    </div>
                    <div class="text-right pull-right">
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <script>
        $(document).ready(function() {
            setInterval(function() {
                $('#result').load("pelayanan_d #result");
            }, 3000);
        });
    </script>
@endsection
