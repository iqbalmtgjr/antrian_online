@extends('layouts.master')

@section('content')
    <div class="card m-b-30 m-t-30">
        <div class="card-body">
            <h1 id="teks">Selamat Datang Di SIAON</h1>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                {{ __('You are logged in!') }}
            </div>

        </div>
    </div>
@endsection
