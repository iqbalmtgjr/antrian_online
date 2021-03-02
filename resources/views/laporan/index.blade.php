@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">Laporan Antrian</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <form action="/laporan" method="GET">
                        <h5>Filter Laporan</h5>
                        <div class="row mb-4">
                            <div class="input-group col-md-3 mb-4">
                                <select class="custom-select" name="loket_pelayanan" id="loket_pelayanan">
                                    <option value="">-- Pilih Loket --</option>
                                    <option value="1">Loket A</option>
                                    <option value="2">Loket B</option>
                                    <option value="3">Loket C</option>
                                    <option value="4">Loket D</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <input type="date" name="tgl_awal" class="input-group form-control">
                                <label for="">* Tanggal Awal</label>
                            </div>
                            <div class="col-md-3">
                                <input type="date" name="tgl_akhir" class="input-group form-control">
                                <label for="">* Tanggal Akhir</label>
                            </div>
                            <div class="col-md-1">
                                <button class="form-control btn-primary" type="submit">Cari</button>
                            </div>
                        </div>
                    </form>
                    <table id="datatable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Loket Pelayanan</th>
                                <th>No Antrian</th>
                                <th>Hari</th>
                                <th>Tanggal</th>
                                <th>Lama Pelayanan</th>
                            </tr>
                        </thead>


                        <tbody>
                            @foreach ($data as $datas)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    @if ($datas->id_pelayanan == 1)
                                        <td>Loket A</td>
                                    @elseif ($datas->id_pelayanan == 2)
                                        <td>Loket B</td>
                                    @elseif ($datas->id_pelayanan == 3)
                                        <td>Loket C</td>
                                    @else
                                        <td>Loket D</td>
                                    @endif

                                    @if ($datas->id_pelayanan == 1 && $datas->no_antrian >= 10)
                                        <td>{{ 'A' . $datas->no_antrian }}</td>
                                    @elseif ($datas->id_pelayanan == 1 )
                                        <td>{{ 'A0' . $datas->no_antrian }}</td>
                                    @elseif($datas->id_pelayanan == 2 && $datas->no_antrian >= 10)
                                        <td>{{ 'B' . $datas->no_antrian }}</td>
                                    @elseif ($datas->id_pelayanan == 2)
                                        <td>{{ 'B0' . $datas->no_antrian }}</td>
                                    @elseif($datas->id_pelayanan == 3 && $datas->no_antrian >= 10)
                                        <td>{{ 'C' . $datas->no_antrian }}</td>
                                    @elseif ($datas->id_pelayanan == 3)
                                        <td>{{ 'C0' . $datas->no_antrian }}</td>
                                    @elseif($datas->id_pelayanan == 4 && $datas->no_antrian >= 10)
                                        <td>{{ 'D' . $datas->no_antrian }}</td>
                                    @elseif ($datas->id_pelayanan == 4)
                                        <td>{{ 'D0' . $datas->no_antrian }}</td>
                                    @endif

                                    <td>{{ $datas->hari }}</td>
                                    <td>{{ $datas->tgl_antrian }}</td>
                                    <td>{{ $datas->lama_pelayanan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
