@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">Loket Pelayanan A</h4>
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
                    <table id="datatable" class="table table-striped">
                        <a href="#" class="btn btn-primary btn-md m-l-15 m-b-15" data-toggle="modal"
                            data-target="#mulai_lanjut"><i class="mdi mdi-skip-next-circle"></i>
                            Mulai/Lanjut</a>
                        <!-- Modal -->
                        <div class="modal fade" id="mulai_lanjut" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Pelayanan Loket A</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('/pelayanan/lanjut/a') }}" method="post">
                                            @csrf
                                            <center>
                                                @if ($data->count() >= 9)
                                                    <h2>
                                                        A{{ App\Models\Antrian::where('id_pelayanan', 1)->first()->no_antrian + 1 }}

                                                    </h2>
                                                @else
                                                    <h2>
                                                        @if (App\Models\Antrian::where('id_pelayanan', 1)
            ->get()
            ->count() <= 1)
                                                            A0{{ $data->count() + 1 }}
                                                        @else
                                                            A0{{ App\Models\Antrian::where('id_pelayanan', 1)->first()->no_antrian + 1 }}
                                                        @endif
                                                    </h2>
                                                @endif
                                            </center>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
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
                        <thead>
                            <tr>
                                <th>No Antrian</th>
                                <th>Estimasi Waktu Tunggu</th>
                            </tr>
                        </thead>

                        @foreach ($data as $data)
                            <tbody>
                                <tr>
                                    @if ($data->no_antrian >= 10)
                                        <td>{{ 'A' . $data->no_antrian }}</td>
                                    @else
                                        <td>{{ 'A0' . $data->no_antrian }}</td>
                                    @endif
                                    {{-- <td id="antri{{ $data->id }}"></td> --}}
                                    <td>
                                        {{-- @if ($data->first()->waktu_awal_antrian <= $data->first()->estimasi) --}}
                                        {{-- Sedang Dalam Pelayanan --}}
                                        {{-- @else --}}
                                        {{ 'Akan Dilayani Pada Pukul ' . $data->estimasi . ' Wib' }}
                                        {{-- {{ $localtime }} --}}
                                        {{-- @endif --}}
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
