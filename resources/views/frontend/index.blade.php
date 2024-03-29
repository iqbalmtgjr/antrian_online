<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    {{-- <meta http-equiv="Refresh" Content="5"> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Template Mo">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href={{ asset('assets/images/logosintang.png') }} rel="shortcut icon">
    <title>SIANTRI Capil Sintang</title>
    <!--

ART FACTORY

https://templatemo.com/tm-537-art-factory

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href={{ asset('frontend/assets/css/bootstrap.min.css') }}>
    <link rel="stylesheet" type="text/css" href={{ asset('frontend/assets/css/font-awesome.css') }}>
    <link rel="stylesheet" type="text/css" href={{ asset('frontend/assets/css/templatemo-art-factory.css') }}>
    <link rel="stylesheet" type="text/css" href={{ asset('frontend/assets/css/owl-carousel.css') }}>

</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="#" class="logo">DUKCAPIL</a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#welcome" class="active">Utama</a></li>
                            <li class="scroll-to-section"><a href="#about">Lacak Antrian</a></li>
                            <li class="scroll-to-section"><a href="#services">Info Loket Pelayanan</a></li>
                            <li class="scroll-to-section"><a href="#frequently-question">Keuntungan SIANTRI</a></li>
                            <li class="scroll-to-section"><a href="#contact-us">Lokasi</a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->


    <!-- ***** Welcome Area Start ***** -->
    <div class="welcome-area" id="welcome">

        <!-- ***** Header Text Start ***** -->
        <div class="header-text">
            <div class="container">
                <div class="row">
                    <div class="left-text col-lg-6 col-md-6 col-sm-12 col-xs-12"
                        data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                        <br><br><br><br>
                        <h1>Selamat Datang <br> di<strong> SIANTRI</strong></h1>
                        <p>SIANTRI Adalah Sistem Informasi Antrian Online Berbasis Website Untuk Memudahkan Pengatri
                            Agar Dapat Memantau Nomor Antrian di Disdukcapil Sintang</p>
                    </div>
                    <div style="margin-top: -10px" class="mb-5 col-lg-6 col-md-6 col-sm-12 col-xs-12"
                        data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                        <img width="50%" src={{ asset('frontend/assets/images/l_sintang.png') }} alt="">
                    </div>
                </div>
            </div>
        </div>
        <!-- ***** Header Text End ***** -->
    </div>
    <!-- ***** Welcome Area End ***** -->
    <section class="section" id="about">
        <div class="container">
            <div class="mb-5">
                <center>
                    <h1>Antrian Online Real Time</h1>
                </center>
            </div>
            <form method="GET" action="/">
                <div class="row">
                    <div class="input-group mb-2 col-md-6">
                        <select name="id_pelayanan" class="custom-select" id="id_pelayanan">
                            <option value="">-- Pilih Loket --</option>
                            <option value="1">Loket A</option>
                            <option value="2">Loket B</option>
                            <option value="3">Loket C</option>
                            <option value="4">Loket D</option>
                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Pilih</button>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                    <div class="input-group mb-2 col-md-3">
                        <input type="search" name="cari" id="cari" class="form-control" aria-label="Search"
                            placeholder="Cari No Antrian">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Cari</button>
                        </div>
                    </div>
            </form>
        </div>
        {{-- <div class="col-md-12"> --}}
        {{-- <button id="loadbasic">basic load</button> --}}
        {{-- <div id="result"></div> --}}
        <div id="result">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No Antrian</th>
                        <th scope="col">Loket</th>
                        <th scope="col">Estimasi</th>
                    </tr>
                </thead>
                @foreach ($data as $datas)
                    <tbody>
                        <tr>
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

                            @if ($datas->id_pelayanan == 1)
                                <td>Loket A</td>
                            @elseif($datas->id_pelayanan == 2)
                                <td>Loket B</td>
                            @elseif($datas->id_pelayanan == 3)
                                <td>Loket C</td>
                            @elseif($datas->id_pelayanan == 4)
                                <td>Loket D</td>
                            @endif

                            @if ($datas->estimasi <= $localtime)
                                <td> Sedang Dalam Pelayanan </td>
                            @else
                                <td> {{ 'Akan Dilayani Pada Pukul ' . $datas->estimasi . ' Wib' }} </td>
                            @endif
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
        {{-- <div class="row"> --}}
        <div class="col-4">
            Menampilkan
            {{ $data->firstItem() }}
            sampai
            {{ $data->lastItem() }}
            dari
            {{ $data->total() }}
            data
        </div>
        <div class="pull-right">
            {{ $data->links() }}
        </div>
        {{-- </div> --}}
        {{-- </div> --}}
        </div>

    </section>

    <!-- ***** Features Big Item Start ***** -->
    <section class="section" id="services">
        <div class="container">
            <div style="margin-top: -50px" class="mb-3">
                <center>
                    <h2>Keterangan Loket Pelayanan</h2>
                </center> <br>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="card border-dark mb-3" style="max-width: 18rem; height:400px ">
                        <div class="card-header text-light bg-dark text-center">
                            <h5>Loket A</h5>
                        </div>
                        <div class="card-body text-dark">
                            <ul style="padding-left: 7px">
                                <li>Pengambilan KTP</li>
                                <li>Perbaiki KTP</li>
                                <li>Pembuatan KIA</li>
                                <li>Pengambilan KIA</li>
                                <li>Pengambilan KK</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card border-dark mb-3" style="max-width: 18rem; height:400px">
                        <div class="card-header text-light bg-dark text-center">
                            <h5>Loket B</h5>
                        </div>
                        <div class="card-body text-dark">
                            <ul style="padding-left: 7px">
                                <li>Pindah Datang</li>
                                <li>Pindah Antar Desa</li>
                                <li>Pindah Antar Provinsi</li>
                                <li>Pindah Antar Kecamatan</li>
                                <li>Pindah Antar Kabupaten</li>
                                <li>Pengambilan Pindah Antar Kabupaten</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card border-dark mb-3" style="max-width: 18rem; height:400px">
                        <div class="card-header text-light bg-dark text-center">
                            <h5>Loket C</h5>
                        </div>
                        <div class="card-body text-dark">
                            <ul style="padding-left: 7px">
                                <li>Penyerahan dan Pengambilan Akta Perkawinan</li>
                                <li>Penyerahan dan Pengambilan Akta Perceraian</li>
                                <li>Penyerahan dan Pengambilan Akta Kelahiran</li>
                                <li>Penyerahan dan Pengambilan Akta Kematian</li>
                                <li>Penyerahan dan Pengambilan Akta Pengesahan Anak</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card border-dark mb-3" style="max-width: 18rem; height:400px">
                        <div class="card-header text-light bg-dark text-center">
                            <h5>Loket D</h5>
                        </div>
                        <div class="card-body text-dark">
                            <ul style="padding-left: 7px">
                                <li>Perubahan KK</li>
                                <li>Tambah Jiwa</li>
                                <li>Perbaiki KK</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="hr"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- ***** Frequently Question Start ***** -->
    <section class="section" id="frequently-question">
        <div class="container">
            <!-- ***** Section Title Start ***** -->
            <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12"
                    data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                    <img src={{ asset('frontend/assets/images/disdukcapil.jpg') }}
                        class="rounded img-fluid d-block mx-auto" alt="App">
                </div>
                <div class="right-text col-lg-5 col-md-12 col-sm-12 mobile-top-fix">
                    <div class="left-heading">
                        <h5>Keuntungan Dari SIANTRI</h5> <br>
                    </div>
                    <div class="left-text">
                        <p>Keuntungan Menggunakan Sistem Informasi Antrian Online <b>( SIANTRI )</b> Adalah dapat
                            mengetahui atau memantau nomor antrian yang
                            sudah di ambil dari instansi Dinas Kependudukan Dan Pencatatan Sipil Sintang Secara Online
                            Tanpa Harus Datang Terlebih Dahulu ke
                            Dinas Kependudukan Dan Pencatatan Sipil Sintang.<br><br> </p>
                    </div>
                </div>
            </div>
            <!-- ***** Section Title End ***** -->
        </div>
    </section>
    <!-- ***** Frequently Question End ***** -->


    <!-- ***** Contact Us Start ***** -->
    <section class="section" id="contact-us">
        <div class="container">
            <div class="row">
                <!-- ***** Contact Map Start ***** -->
                <div class="col-lg-12 col-md-6 col-sm-12">
                    <div id="map">
                        <!-- How to change your own map point
                           1. Go to Google Maps
                           2. Click on your location point
                           3. Click "Share" and choose "Embed map" tab
                           4. Copy only URL and paste it within the src="" field below
                    -->
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.81602774175!2d111.49835651475325!3d0.06142219995518961!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e01de0e35dcecc9%3A0x38750985d63180e3!2sDinas%20Kependudukan%20dan%20Catatan%20Sipil%20Sintang!5e0!3m2!1sid!2sid!4v1614321729107!5m2!1sid!2sid"
                            width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
                <!-- ***** Contact Map End ***** -->

            </div>
        </div>
    </section>
    <!-- ***** Contact Us End ***** -->

    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12">
                    <p class="copyright">Copyright &copy; 2021 Muhammad Iqbal

                        . Design: <a rel="nofollow" href="https://templatemo.com">TemplateMo</a></p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src={{ asset('frontend/assets/js/jquery-2.1.0.min.js') }}></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src={{ asset('frontend/assets/js/popper.js') }}></script>
    <script src={{ asset('frontend/assets/js/bootstrap.min.js') }}></script>

    <!-- Plugins -->
    <script src={{ asset('frontend/assets/js/owl-carousel.js') }}></script>
    <script src={{ asset('frontend/assets/js/scrollreveal.min.js') }}></script>
    <script src={{ asset('frontend/assets/js/waypoints.min.js') }}></script>
    <script src={{ asset('frontend/assets/js/jquery.counterup.min.js') }}></script>
    <script src={{ asset('frontend/assets/js/imgfix.min.js') }}></script>

    <!-- Global Init -->
    <script src={{ asset('frontend/assets/js/custom.js') }}></script>

    <script>
        $(document).ready(function() {
            setInterval(function() {
                $('#result').load("/ #result");
            }, 3000);
        });
    </script>

</body>

</html>
