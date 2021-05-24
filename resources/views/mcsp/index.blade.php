@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">Multi Channel Single Phase</h4>
            </div>
        </div>
    </div>
    <form action="/multi_channel_single_phase" method="get">
        <div class="row ml-3 mb-3 mt-3 col-md-12">
            <label for="kalender" class="col-md-3">Pilih Tanggal</label>
            <input type="date" class="form-control col-md-5" name="kalender" id="kalender" value="">
            <a href="" class="btn btn-success btn-md offset-1 col-md-3" type="submit">Pilih</a>
        </div>
    </form>
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card border-dark mb-3" style="max-width: 18rem; height:560px ">
                                <div class="card-header text-light bg-dark text-center">
                                    <h5>Loket A</h5>
                                </div>
                                <div class="card-body text-dark">
                                    {{-- <form method="GET" action="/multi_channel_single_phase">
                                        <div class="row">
                                            <div class="input-group">
                                                <select name="loket_a" class="custom-select">
                                                    <option value="">-- Setiap Hari --</option>
                                                    <option value="Senin">Senin</option>
                                                    <option value="Selasa">Selasa</option>
                                                    <option value="Rabu">Rabu</option>
                                                    <option value="Kamis">Kamis</option>
                                                    <option value="Jum'at">Jum'at</option>
                                                </select>
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary" type="submit">Pilih</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form> --}}
                                    <div class="row mt-3">
                                        <div class="col-md-6 mt-2">
                                            <h6>Rasio Pelayanan</h6>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" value="{{ $hasil_persen_rasio }}" disabled
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <h6>P0</h6>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" disabled value="{{ $hasil_tp0 . ' Menit' }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-4">
                                            <h6>Wq</h6>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" disabled value="{{ $format_wq . ' Menit/Orang' }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-4">
                                            <h6>W</h6>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" disabled value="{{ $w . ' Menit/Orang' }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <h6>Lq</h6>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" disabled value="{{ $format_lq . ' Orang' }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <h6>L</h6>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" disabled value="{{ $format_L . ' Orang' }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mt-4 ml-2">
                                        <center style="color: red">
                                            <h6 class="text-center">Rekomendasi</h6>
                                            <p>{{ $rekomendasi }}</p>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card border-dark mb-3" style="max-width: 18rem; height:560px ">
                                <div class="card-header text-light bg-dark text-center">
                                    <h5>Loket B</h5>
                                </div>
                                <div class="card-body text-dark">
                                    {{-- <form method="GET" action="/multi_channel_single_phase">
                                        <div class="row">
                                            <div class="input-group">
                                                <select name="loket_b" class="custom-select">
                                                    <option value="">-- Setiap Hari --</option>
                                                    <option value="Senin">Senin</option>
                                                    <option value="Selasa">Selasa</option>
                                                    <option value="Rabu">Rabu</option>
                                                    <option value="Kamis">Kamis</option>
                                                    <option value="Jum'at">Jum'at</option>
                                                </select>
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary" type="submit">Pilih</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form> --}}
                                    <div class="row mt-3">
                                        <div class="col-md-6 mt-2">
                                            <h6>Rasio Pelayanan</h6>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" value="{{ $hasil_persen_rasio_b }}" disabled
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <h6>P0</h6>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" disabled value="{{ $hasil_tp0_b . ' Menit' }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-4">
                                            <h6>Wq</h6>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" disabled value="{{ $format_wq_b . ' Menit/Orang' }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-4">
                                            <h6>W</h6>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" disabled value="{{ $w_b . ' Menit/Orang' }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <h6>Lq</h6>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" disabled value="{{ $format_lq_b . ' Orang' }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <h6>L</h6>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" disabled value="{{ $format_L_b . ' Orang' }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mt-4 ml-2">
                                        <center style="color: red">
                                            <h6 class="text-center">Rekomendasi</h6>
                                            <p>{{ $rekomendasi_b }}</p>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card border-dark mb-3" style="max-width: 18rem; height:560px ">
                                <div class="card-header text-light bg-dark text-center">
                                    <h5>Loket C</h5>
                                </div>
                                <div class="card-body text-dark">
                                    {{-- <form method="GET" action="/multi_channel_single_phase">
                                        <div class="row">
                                            <div class="input-group">
                                                <select name="loket_c" class="custom-select">
                                                    <option value="">-- Setiap Hari --</option>
                                                    <option value="Senin">Senin</option>
                                                    <option value="Selasa">Selasa</option>
                                                    <option value="Rabu">Rabu</option>
                                                    <option value="Kamis">Kamis</option>
                                                    <option value="Jum'at">Jum'at</option>
                                                </select>
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary" type="submit">Pilih</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form> --}}
                                    <div class="row mt-3">
                                        <div class="col-md-6 mt-2">
                                            <h6>Rasio Pelayanan</h6>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" value="{{ $hasil_persen_rasio_c }}" disabled
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <h6>P0</h6>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" disabled value="{{ $hasil_tp0_c . ' Menit' }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-4">
                                            <h6>Wq</h6>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" disabled value="{{ $format_wq_c . ' Menit/Orang' }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-4">
                                            <h6>W</h6>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" disabled value="{{ $w_c . ' Menit/Orang' }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <h6>Lq</h6>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" disabled value="{{ $format_lq_c . ' Orang' }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <h6>L</h6>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" disabled value="{{ $format_L_c . ' Orang' }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mt-4 ml-2">
                                        <center style="color: red">
                                            <h6 class="text-center">Rekomendasi</h6>
                                            <p>{{ $rekomendasi_c }}</p>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card border-dark mb-3" style="max-width: 18rem; height:560px ">
                                <div class="card-header text-light bg-dark text-center">
                                    <h5>Loket D</h5>
                                </div>
                                <div class="card-body text-dark">
                                    {{-- <form method="GET" action="/multi_channel_single_phase">
                                        <div class="row">
                                            <div class="input-group">
                                                <select name="loket_d" class="custom-select">
                                                    <option value="">-- Setiap Hari --</option>
                                                    <option value="Senin">Senin</option>
                                                    <option value="Selasa">Selasa</option>
                                                    <option value="Rabu">Rabu</option>
                                                    <option value="Kamis">Kamis</option>
                                                    <option value="Jum'at">Jum'at</option>
                                                </select>
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary" type="submit">Pilih</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form> --}}
                                    <div class="row mt-3">
                                        <div class="col-md-6 mt-2">
                                            <h6>Rasio Pelayanan</h6>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" value="{{ $hasil_persen_rasio_d }}" disabled
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <h6>P0</h6>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" disabled value="{{ $hasil_tp0_d . ' Menit' }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-4">
                                            <h6>Wq</h6>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" disabled value="{{ $format_wq_d . ' Menit/Orang' }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-4">
                                            <h6>W</h6>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" disabled value="{{ $w_d . ' Menit/Orang' }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <h6>Lq</h6>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" disabled value="{{ $format_lq_d . ' Orang' }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <h6>L</h6>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" disabled value="{{ $format_L_d . ' Orang' }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mt-4 ml-2">
                                        <center style="color: red">
                                            <h6 class="text-center">Rekomendasi</h6>
                                            <p>{{ $rekomendasi_d }}</p>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="col-lg-12 text-center mt-5 mb-5">
                        <button type="button" class="btn btn-lg btn-success" data-toggle="modal"
                            data-target="#exampleModalCenter">Lihat Rekomendasi <i>Multi Channel Single
                                Phase</i></button>
                        <br>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Hasil Dari Multi Channel Single
                                            Phase</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h4> {{ 'Rekomendasi dari sistem ini bahwa disetiap loket pelayanan tidak perlu menambahkan petugas lagi' }}
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <div class="row mt-4">
                        <p>
                            <b>* Keterangan :</b> <br> Rasio Pelayanan = Kualitas Pelayanan <br> P0 = Waktu Kosong Pelayanan
                            <br>
                            Lq = Jumlah rata-rata masyarakat dalam antrian <br> Wq = Waktu rata-rata masyarakat dalam
                            antrian <br>
                            W = Waktu rata-rata masyarakat dalam sistem <br> L = Jumlah rata-rata Masyarakat yang diharapkan
                            dalam sistem
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
