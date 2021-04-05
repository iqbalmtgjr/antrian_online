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
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card border-dark mb-3" style="max-width: 18rem; height:400px ">
                                <div class="card-header text-light bg-dark text-center">
                                    <h5>Loket A</h5>
                                </div>
                                <div class="card-body text-dark">
                                    <form method="GET" action="/multi_channel_single_phase">
                                        <div class="row">
                                            <div class="input-group">
                                                <select name="loket_a" class="custom-select">
                                                    <option value="">-- Semua Hari --</option>
                                                    <option value="Senin">Senin</option>
                                                    <option value="Selasa">Selasa</option>
                                                    <option value="Rabu">Rabu</option>
                                                    <option value="Kamis">Kamis</option>
                                                    <option value="Jum'at">Jum'at</option>
                                                </select>
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-primary" type="submit">Pilih</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card border-dark mb-3" style="max-width: 18rem; height:400px">
                                <div class="card-header text-light bg-dark text-center">
                                    <h5>Loket B</h5>
                                </div>
                                <div class="card-body text-dark">
                                    <form method="GET" action="/multi_channel_single_phase">
                                        <div class="row">
                                            <div class="input-group">
                                                <select name="id_pelayanan" class="custom-select">
                                                    <option value="">-- Semua Hari --</option>
                                                    <option value="Senin">Senin</option>
                                                    <option value="Selasa">Selasa</option>
                                                    <option value="Rabu">Rabu</option>
                                                    <option value="Kamis">Kamis</option>
                                                    <option value="Jum'at">Jum'at</option>
                                                </select>
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-primary" type="submit">Pilih</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card border-dark mb-3" style="max-width: 18rem; height:400px">
                                <div class="card-header text-light bg-dark text-center">
                                    <h5>Loket C</h5>
                                </div>
                                <div class="card-body text-dark">
                                    <form method="GET" action="/multi_channel_single_phase">
                                        <div class="row">
                                            <div class="input-group">
                                                <select name="id_pelayanan" class="custom-select" id="id_pelayanan">
                                                    <option value="">-- Semua Hari --</option>
                                                    <option value="Senin">Senin</option>
                                                    <option value="Selasa">Selasa</option>
                                                    <option value="Rabu">Rabu</option>
                                                    <option value="Kamis">Kamis</option>
                                                    <option value="Jum'at">Jum'at</option>
                                                </select>
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-primary" type="submit">Pilih</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card border-dark mb-3" style="max-width: 18rem; height:400px">
                                <div class="card-header text-light bg-dark text-center">
                                    <h5>Loket D</h5>
                                </div>
                                <div class="card-body text-dark">
                                    <form method="GET" action="/multi_channel_single_phase">
                                        <div class="row">
                                            <div class="input-group">
                                                <select name="id_pelayanan" class="custom-select" id="id_pelayanan">
                                                    <option value="">-- Semua Hari --</option>
                                                    <option value="Senin">Senin</option>
                                                    <option value="Selasa">Selasa</option>
                                                    <option value="Rabu">Rabu</option>
                                                    <option value="Kamis">Kamis</option>
                                                    <option value="Jum'at">Jum'at</option>
                                                </select>
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-primary" type="submit">Pilih</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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
                        </div>
                    </div> --}}
                    </div>
                </div>
            </div>
        </div>
    @endsection
