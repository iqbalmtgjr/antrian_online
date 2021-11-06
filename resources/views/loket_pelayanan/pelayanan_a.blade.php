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
                    <form action="{{ url('/pelayanan/lanjut/a') }}" method="post">
                        @csrf
                        <button id="selesai" class="btn btn-primary btn-md m-l-15 m-b-15"><i
                                class="mdi mdi-skip-next-circle"></i>
                            Mulai/Lanjut</button> <br>
                    </form>
                    <form action="{{ url('/pelayanan_a') }}" method="GET">
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
                            {{-- <div class="modal fade" id="mulai_lanjut" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Pelayanan Loket A</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
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
                                                            @if (App\Models\Antrian::where('id_pelayanan', 1)->get()->count() <= 1)
                                                                -
                                                            @else
                                                                @if (App\Models\Antrian::where('id_pelayanan', 1)->first()->no_antrian >= 9)
                                                                    A{{ App\Models\Antrian::where('id_pelayanan', 1)->first()->no_antrian + 1 }}
                                                                @else
                                                                    A0{{ App\Models\Antrian::where('id_pelayanan', 1)->first()->no_antrian + 1 }}
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
                            </div> --}}

                            <thead class="thead-dark">
                                <tr>
                                    <th>No Antrian</th>
                                    <th>Estimasi Waktu Tunggu</th>
                                </tr>
                            </thead>

                            @foreach ($data as $datas)
                                <input type="hidden" class="form-control" id="id" name="id" value="" readonly>
                                <input type="hidden" class="form-control" id="url_getdata" name="url_getdata"
                                    value="{{ url('get_data_a/') }}" readonly>
                                <tbody>
                                    <tr>
                                        @if ($datas->no_antrian >= 10)
                                            <td>{{ 'A' . $datas->no_antrian }}</td>
                                        @else
                                            <td>{{ 'A0' . $datas->no_antrian }}</td>
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

    {{-- Store Data --}}
    <script>
        function store() {
            // var name = $("#name").val();
            $.ajax({
                type: "post",
                url: "{{ url('/pelayanan/lanjut/a') }}",
                // success: function(data) {
                //     toastr.success("{{ Session::get('sukses') }}", "Selamat")
                // }
            });
        }
    </script>

    {{-- Realtime --}}
    <script>
        $(document).ready(function() {
            setInterval(function() {
                $('#result').load("pelayanan_a #result");
            }, 3000);
        });
    </script>

    {{-- Suara --}}
    <script>
        @if (Session::has('berhasil'))
            toastr.success("{{ Session::get('berhasil') }}", "Selamat");
            // var playlist = ["noantrian","diloket","A","B","C","D","1","2","3","4","5","6","7","8","9"];
            var ext = '.m4a';
        
            var data = "{{ url('get_data_a') }}";
        
            var suara = new Audio();
        
            suara.src = "{{ asset('suara/noantrian') }}"+ext;
            suara.loop = false;
            suara.play();
        
            suara.addEventListener('ended', function(){
            gantiTrack();
            });
        
            function gantiTrack(){
            var suara1 = new Audio();
            suara1.src = "{{ asset('suara/A') }}"+ext;
            suara1.loop = false;
            suara1.play();
            suara1.addEventListener('ended', function(){
            gantiTrack1();
            });
            }
        
            function gantiTrack1(){
            var suara2 = new Audio();
        
            suara2.src = "{{ asset('suara/diloket') }}"+ext;
            suara2.loop = false;
            suara2.play();
            suara2.addEventListener('ended', function(){
            gantiTrack2();
            });
            }
        
            function gantiTrack2(){
            var suara3 = new Audio();
            suara3.src = "{{ asset('suara/A') }}"+ext;
            suara3.loop = false;
            suara3.play();
            }
            console.log(data);
        @endif
    </script>
    {{-- <script>
        var playlist = [
            'noantrian', 'diloket', 'A', 'B', 'C', 'D', '1', '2', '3', '4',
            '5', '6', '7', '8', '9'
        ];
        var ext = '.m4a';

        var suara = new Audio();
        // suara.src = "{{ asset('suara/') }};" + playlist[0];
        suara.src = "{{ asset('suara/noantrian') }}" + ext;
        suara.loop = false;
        // suara.play();

        function mulaiAudio() {
            var play = document.getElementById("selesai");

            play.addEventListener('click', fplay);

            function fplay() {
                suara.play();
            }
        }

        window.addEventListener('load', mulaiAudio);
    </script> --}}
@endsection
