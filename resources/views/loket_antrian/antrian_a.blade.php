@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">Loket Antrian A</h4>
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
                                        <h5 class="modal-title" id="exampleModalLabel">Antrian Loket A</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('/antrian/lanjut') }}" method="post">
                                            @csrf
                                            <center>
                                                @if ($data1->count() >= 9)
                                                    <h2>
                                                        A{{ App\Models\Antrian::all()->count() + 1 }}

                                                    </h2>
                                                @else
                                                    <h2>
                                                        A0{{ App\Models\Antrian::all()->count() + 1 }}
                                                    </h2>
                                                @endif
                                            </center>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        @if ($data1->count() < 1)
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
                                    <td id="antri{{ $data->id }}"></td>

                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                    <div class="row mt-2">
                        {{-- <div class="col-md-4"></div> --}}
                        {{-- <div class="col-md-4"></div> --}}
                        <div class="col-md-4">
                            <a href="#" class="btn btn-success btn-md m-l-15 m-b-15 reset"><i class="mdi mdi-reload"></i>
                                Reset Antrian</a>
                            <a href="#" id="tombol" class="btn btn-danger btn-md m-l-15 m-b-15 stop"><i
                                    class="fa fa-times-circle"></i>
                                Hentikan Antrian</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <script type="text/javascript">
        $('.reset').click(function() {
            Swal.fire({
                    title: 'Yakin?',
                    text: "Mau Reset Antrian ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya',
                })
                .then((result) => {
                    console.log(result);
                    if (result.value) {
                        window.location = "{{ url('/antrian/reset ') }}";
                    }
                });

        });

        $('.stop').click(function() {
            Swal.fire({
                    title: 'Yakin?',
                    text: "Mau Menghentikan Antrian ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya',
                })
                .then((result) => {
                    console.log(result);
                    if (result.value) {
                        window.location = "#tombol";
                    }
                });
        });

        $.ajax({
            url: "{{ url('/getdata') }}",
            cache: false,
            success: function(response) {
                console.log(response);
                const first = response[0];
                const last = response[response.length - 1];
                const created_at = last.created_at;
                console.log(created_at);
                // console.log(last.created_at);
                $.each(response, function(i, item) {
                    // console.log(item.id);
                    // $('#isi' + item.id).html(item.id)
                    // const hm = item.length;
                    // if (i > 1) {
                    const tigamenit = new Date().getTime() + 180000;
                    // } else {
                    // const tigamenit = new Date().getTime() + 180000 + last.created_at;
                    // }
                    const hitungMundur = setInterval(function() {
                        const sekarang = new Date().getTime();
                        const selisih = tigamenit - sekarang;

                        const hari = Math.floor(selisih / (1000 * 60 * 60 * 24));
                        const jam = Math.floor((selisih % (1000 * 60 * 60 * 24)) / (1000 * 60 *
                            60));
                        const menit = Math.floor((selisih % (1000 * 60 * 60)) / (1000 * 60));
                        const detik = Math.floor((selisih % (1000 * 60)) / 1000);

                        const antri = document.getElementById("antri" + item.id);
                        if (menit > 9) {
                            antri.innerText = "0" +
                                jam +
                                ":" +
                                menit +
                                ":" +
                                detik +
                                " detik lagi";
                        } else {
                            antri.innerText = "0" +
                                jam +
                                ":0" +
                                menit +
                                ":" +
                                detik +
                                " detik lagi";
                        }

                        if (selisih < 0) {
                            clearInterval(hitungMundur);
                            antri.innerText = "Sedang Dalam Pelayanan";
                        } else if (i == 0) {
                            antri.innerText = "Sedang Dalam Pelayanan";
                        }
                        const selesai = document.getElementById("selesai");
                        tombol.addEventListener("click", function() {
                            clearInterval(hitungMundur);
                            teks.innerText = "Anda Selesai";
                            console.log('berhenti');
                        });

                    }, 1000);
                    const tombol = document.getElementById("tombol");
                    tombol.addEventListener("click", function() {
                        clearInterval(hitungMundur);
                        teks.innerText = "Berhenti";
                        console.log('berhenti');
                    });
                });



            }
        });

    </script>


@endsection
