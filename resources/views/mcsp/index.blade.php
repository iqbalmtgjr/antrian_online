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
                    <div class="col-lg-12 text-center mt-5 mb-5">
                        <button class="btn btn-lg btn-success">Lihat Rekomendasi <i>Multi Channel Single Phase</i></button>
                        <br>
                        {{-- @foreach ($lambda as $item)
                            {{ $item }}
                        @endforeach --}}
                        {{-- {{ $hasil }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
