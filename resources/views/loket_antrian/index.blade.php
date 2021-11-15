@extends('layouts.master')

@section('content')

    <div class="col-sm-12">
        <div class="row">
            <div class="page-title-box">
                <h4 class="page-title">Loket Antrian</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card" style="height:540px">
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card border-dark mb-3" style="max-width: 18rem; height:320px ">
                                    <div class="card-header text-light bg-dark text-center">
                                        <h5>Loket A</h5>
                                    </div>
                                    <center>
                                        <div class="card-body text-dark mt-1">
                                            <form action="{{ url('/antrian/lanjut/a') }}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-primary btn-md m-l-15 mb-3"><i
                                                        class="mdi mdi-skip-next-circle"></i> <br>
                                                    Mulai/Lanjut</button>
                                            </form>
                                            <a href="{{ url('/antrian/cetak_a') }}"
                                                class="btn btn-success btn-md ml-3 mb-3 ">
                                                <i class="mdi mdi-printer"></i> <br> Cetak Antrian
                                            </a>
                                            <a href="#" class="btn btn-danger btn-md m-l-15 mb-3 reset_a"><i
                                                    class="mdi mdi-reload"></i> <br>
                                                Reset Antrian</a>
                                            {{-- <a href="#" class="btn btn-warning btn-md m-l-15">No Antrian <br>
                                                A01</a> --}}
                                        </div>
                                        <div class="card border-dark">
                                            <div class="card-body text-dark mt-1">
                                                @if ($antrian_a == null)
                                                    <h2>Tidak Ada <br> Antrian</h2>
                                                @elseif ($antrian_a->no_antrian > 9)
                                                    <h2>Antrian <br> A{{ $antrian_a->no_antrian }}</h2>
                                                @else
                                                    <h2>Antrian <br> A0{{ $antrian_a->no_antrian }}</h2>
                                                @endif
                                            </div>
                                        </div>
                                    </center>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="card border-dark mb-3" style="max-width: 18rem; height:320px">
                                    <div class="card-header text-light bg-dark text-center">
                                        <h5>Loket B</h5>
                                    </div>
                                    <center>
                                        <div class="card-body text-dark mt-1">
                                            <form action="{{ url('/antrian/lanjut/b') }}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-primary btn-md m-l-15 mb-3"><i
                                                        class="mdi mdi-skip-next-circle"></i> <br>
                                                    Mulai/Lanjut</button>
                                            </form>
                                            <a href="{{ url('/antrian/cetak_b') }}"
                                                class="btn btn-success btn-md ml-3 mb-3 ">
                                                <i class="mdi mdi-printer"></i> <br> Cetak Antrian
                                            </a>
                                            <a href="#" class="btn btn-danger btn-md m-l-15 mb-3 reset_b"><i
                                                    class="mdi mdi-reload"></i> <br>
                                                Reset Antrian</a>
                                            {{-- <a href="#" class="btn btn-warning btn-md m-l-15">No Antrian <br>
                                                A01</a> --}}
                                        </div>
                                        <div class="card border-dark">
                                            <div class="card-body text-dark mt-1">
                                                @if ($antrian_b == null)
                                                    <h2>Tidak Ada <br> Antrian</h2>
                                                @elseif ($antrian_b->no_antrian > 9)
                                                    <h2>Antrian <br> B{{ $antrian_b->no_antrian }}</h2>
                                                @else
                                                    <h2>Antrian <br> B0{{ $antrian_b->no_antrian }}</h2>
                                                @endif
                                            </div>
                                        </div>
                                    </center>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="card border-dark mb-3" style="max-width: 18rem; height:320px">
                                    <div class="card-header text-light bg-dark text-center">
                                        <h5>Loket C</h5>
                                    </div>
                                    <center>
                                        <div class="card-body text-dark mt-1">
                                            <form action="{{ url('/antrian/lanjut/c') }}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-primary btn-md m-l-15 mb-3"><i
                                                        class="mdi mdi-skip-next-circle"></i> <br>
                                                    Mulai/Lanjut</button>
                                            </form>
                                            <a href="{{ url('/antrian/cetak_c') }}"
                                                class="btn btn-success btn-md ml-3 mb-3 ">
                                                <i class="mdi mdi-printer"></i> <br> Cetak Antrian
                                            </a>
                                            <a href="#" class="btn btn-danger btn-md m-l-15 mb-3 reset_c"><i
                                                    class="mdi mdi-reload"></i> <br>
                                                Reset Antrian</a>
                                            {{-- <a href="#" class="btn btn-warning btn-md m-l-15">No Antrian <br>
                                                A01</a> --}}
                                        </div>
                                        <div class="card border-dark">
                                            <div class="card-body text-dark mt-1">
                                                @if ($antrian_c == null)
                                                    <h2>Tidak Ada <br> Antrian</h2>
                                                @elseif ($antrian_c->no_antrian > 9)
                                                    <h2>Antrian <br> C{{ $antrian_c->no_antrian }}</h2>
                                                @else
                                                    <h2>Antrian <br> C0{{ $antrian_c->no_antrian }}</h2>
                                                @endif
                                            </div>
                                        </div>
                                    </center>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="card border-dark mb-3" style="max-width: 18rem; height:320px">
                                    <div class="card-header text-light bg-dark text-center">
                                        <h5>Loket D</h5>
                                    </div>
                                    <center>
                                        <div class="card-body text-dark mt-1">
                                            <form action="{{ url('/antrian/lanjut/d') }}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-primary btn-md m-l-15 mb-3"><i
                                                        class="mdi mdi-skip-next-circle"></i> <br>
                                                    Mulai/Lanjut</button>
                                            </form>
                                            <a href="{{ url('/antrian/cetak_d') }}"
                                                class="btn btn-success btn-md ml-3 mb-3 ">
                                                <i class="mdi mdi-printer"></i> <br> Cetak Antrian
                                            </a>
                                            <a href="#" class="btn btn-danger btn-md m-l-15 mb-3 reset_d"><i
                                                    class="mdi mdi-reload"></i> <br>
                                                Reset Antrian</a>
                                            {{-- <a href="#" class="btn btn-warning btn-md m-l-15">No Antrian <br>
                                                A01</a> --}}
                                        </div>
                                        <div class="card border-dark">
                                            <div class="card-body text-dark mt-1">
                                                @if ($antrian_d == null)
                                                    <h2>Tidak Ada <br> Antrian</h2>
                                                @elseif ($antrian_d->no_antrian > 9)
                                                    <h2>Antrian <br> D{{ $antrian_d->no_antrian }}</h2>
                                                @else
                                                    <h2>Antrian <br> D0{{ $antrian_d->no_antrian }}</h2>
                                                @endif
                                            </div>
                                        </div>
                                    </center>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="hr"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <script>
        $('.reset_a').click(function() {
            Swal.fire({
                    title: 'Yakin?',
                    text: "Mau Reset Antrian A?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya',
                })
                .then((result) => {
                    console.log(result);
                    if (result.value) {
                        window.location = "{{ url('/antrian/reset/a ') }}";
                    }
                });

        });
        $('.reset_b').click(function() {
            Swal.fire({
                    title: 'Yakin?',
                    text: "Mau Reset Antrian B?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya',
                })
                .then((result) => {
                    console.log(result);
                    if (result.value) {
                        window.location = "{{ url('/antrian/reset/b ') }}";
                    }
                });

        });
        $('.reset_c').click(function() {
            Swal.fire({
                    title: 'Yakin?',
                    text: "Mau Reset Antrian C?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya',
                })
                .then((result) => {
                    console.log(result);
                    if (result.value) {
                        window.location = "{{ url('/antrian/reset/c ') }}";
                    }
                });

        });
        $('.reset_d').click(function() {
            Swal.fire({
                    title: 'Yakin?',
                    text: "Mau Reset Antrian D?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya',
                })
                .then((result) => {
                    console.log(result);
                    if (result.value) {
                        window.location = "{{ url('/antrian/reset/d ') }}";
                    }
                });

        });
    </script>
@endsection
