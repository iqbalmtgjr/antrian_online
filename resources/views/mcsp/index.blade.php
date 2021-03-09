@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Multi Channel Single Phase</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">
                <form action="/laporan" method="GET">
                    {{-- <h5>Filter Laporan</h5> --}}
                    {{-- <div class="row mb-4">
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
                            <input type="date" class="input-group form-control">
                            <label for="">* Tanggal Awal</label>
                        </div>
                        <div class="col-md-3">
                            <input type="date" class="input-group form-control">
                            <label for="">* Tanggal Akhir</label>
                        </div>
                        <div class="col-md-1">
                            <button class="form-control btn-primary" type="submit">Cari</button>
                        </div>
                    </div> --}}
                </form>
                <div class="col-lg-12 text-center mt-5 mb-5">
                    <button class="btn btn-lg btn-success">Lihat Rekomendasi <i>Multi Channel Single Phase</i></button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection