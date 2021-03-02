<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Antrian Online - Capil Sintang</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Mannatthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link href={{asset("assets/images/logosintang.png")}} rel="shortcut icon">

        <link href={{asset("assets/plugins/morris/morris.css")}} rel="stylesheet" type="text/css">
 
        <link href={{asset("assets/css/bootstrap.min.css")}} rel="stylesheet" type="text/css">
        <link href={{asset("assets/css/icons.css")}} rel="stylesheet" type="text/css">
        <link href={{asset("assets/css/style.css")}} rel="stylesheet" type="text/css">

        {{-- <link rel="stylesheet" href="sweetalert2.min.css"> --}}
        {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> --}}

        {{-- JAM --}}
        <script src={{ asset("js/jam.js") }}></script>

        <!-- DataTables -->
        {{-- <link href={{ asset("assets/plugins/datatables/dataTables.bootstrap4.min.css") }} rel="stylesheet" type="text/css" />
        <link href={{ asset("assets/plugins/datatables/buttons.bootstrap4.min.css") }} rel="stylesheet" type="text/css" />
        <link href={{ asset("assets/plugins/datatables/responsive.bootstrap4.min.css") }} rel="stylesheet" type="text/css" /> --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">

        {{-- Toastr --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">

    </head>


    <body class="fixed-left" onload="realtimeClock()">

        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
                    <i class="ion-close"></i>
                </button>

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="#" class="logo"><img style="height: 50px" src="{{asset('assets/images/sintang.png')}}" alt=""> &nbsp; SIANTRI</a>
                    </div>
                </div>

                <div class="sidebar-inner slimscrollleft">

                    <div id="sidebar-menu">
                        <ul>
                            <li class="menu-title">Main</li>

                            <li>
                                <a href="{{ url('/home') }}" class="waves-effect {{ request()->is('/home') ? 'active' : '' }}">
                                    <i class="mdi mdi-airplay"></i>
                                    <span> Dashboard </span>
                                </a>
                            </li>
                            @if (auth()->user()->role == 'Admin')
                            <li>
                                <a href="{{ url('/kelola_data_koordinator') }}" class="waves-effect {{ request()->is('/kelola_data_koordinator') ? 'active' : '' }}">
                                    <i class="fa fa-users"></i>
                                    <span> Kelola Data Koordinator </span>
                                </a>
                            </li>
                            @endif
                            
                            @if (auth()->user()->role == 'Admin')
                            <li>
                                <a href="{{ url('/kelola_data_kepala_bagian') }}" class="waves-effect {{ request()->is('/kelola_data_kepala_bagian') ? 'active' : '' }}">
                                    <i class="fa fa-users"></i>
                                    <span> Kelola Data K. Bagian </span>
                                </a>
                            </li>
                            @endif

                            @if (auth()->user()->role == 'Koordinator')
                            <li>
                                <a href="{{ url('/kelola_data_petugas') }}" class="waves-effect {{ request()->is('/kelola_data_petugas') ? 'active' : '' }}">
                                    <i class="fa fa-users"></i>
                                    <span> Kelola Petugas </span>
                                </a>
                            </li>
                            @endif

                            @if (auth()->user()->role == 'Admin')
                            <li>
                                <a href="{{ url('/kelola_loket_pelayanan') }}" class="waves-effect {{ request()->is('/kelola_loket_pelayanan') ? 'active' : '' }}">
                                    <i class="fa fa-cog"></i>
                                    <span> Kelola Loket Pelayanan </span>
                                </a>
                            </li>
                            @endif

                            @if (auth()->user()->role == 'Petugas')
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect {{ request()->is('/javascript:void(0);') ? 'active' : '' }}"><i class="fa fa-desktop"></i> <span> Loket Antrian </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li class="{{ request()->is('/antrian_a') ? 'active' : '' }}"><a href="{{ url('/antrian_a') }}">Loket A</a></li>
                                    <li class="{{ request()->is('/antrian_b') ? 'active' : '' }}"><a href="{{ url('/antrian_b') }}">Loket B</a></li>
                                    <li class="{{ request()->is('/antrian_c') ? 'active' : '' }}"><a href="{{ url('/antrian_c') }}">Loket C</a></li>
                                    <li class="{{ request()->is('/antrian_d') ? 'active' : '' }}"><a href="{{ url('/antrian_d') }}">Loket D</a></li>
                                </ul>
                            </li>
                            @endif

                            @if (auth()->user()->role == 'Petugas')
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect {{ request()->is('/javascript:void(0);') ? 'active' : '' }}"><i class="fa fa-desktop"></i> <span> Loket Pelayanan </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li class="{{ request()->is('/pelayanan_a') ? 'active' : '' }}"><a href="/pelayanan_a">Loket A</a></li>
                                    <li class="{{ request()->is('/pelayanan_b') ? 'active' : '' }}"><a href="/pelayanan_b">Loket B</a></li>
                                    <li class="{{ request()->is('/pelayanan_c') ? 'active' : '' }}"><a href="/pelayanan_c">Loket C</a></li>
                                    <li class="{{ request()->is('/pelayanan_d') ? 'active' : '' }}"><a href="/pelayanan_d">Loket D</a></li>
                                </ul>
                            </li>
                            @endif

                            @if (auth()->user()->role == 'Koordinator')
                            <li>
                                <a href="{{ url('/kelola_lama_pelayanan') }}" class="waves-effect {{ request()->is('/kelola_lama_pelayanan') ? 'active' : '' }}">
                                    <i class="fa fa-clock-o"></i>
                                    <span> K. Lama Pelayanan </span>
                                </a>
                            </li>
                            @endif

                            @if (auth()->user()->role == 'Kepala Bagian')
                            <li>
                                <a href="{{ url('/multi_channel_single_phase') }}" class="waves-effect {{ request()->is('/multi_channel_single_phase') ? 'active' : '' }}">
                                    <i class="fa fa-gears (alias)"></i>
                                    <span> MCSP </span>
                                </a>
                            </li>
                            @endif                           

                            @if (auth()->user()->role == 'Kepala Bagian')
                            <li>
                                <a href="{{ url('/laporan') }}" class="waves-effect {{ request()->is('/laporan') ? 'active' : '' }}">
                                    <i class="fa fa-files-o"></i>
                                    <span> Laporan </span>
                                </a>
                            </li>
                            @endif                                                       

                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div> <!-- end sidebarinner -->
            </div>
            <!-- Left Sidebar End -->

            <!-- Start right Content here -->

            <div class="content-page">
                <!-- Start content -->
                <div class="content">

                    <!-- Top Bar Start -->
                    <div class="topbar">

                        <nav class="navbar-custom pb-3">

                            <ul class="list-inline float-right mb-0">
                                
                                <li class="list-inline-item dropdown notification-list">
                                    <a style="color: white" class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                                       aria-haspopup="false" aria-expanded="false">
                                      {{  auth()->user()->role }} &nbsp; <img src="{{asset('assets/images/logosintang.png')}}" alt="user" class="rounded-circle">
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                        <!-- item-->
                                        <div class="dropdown-item noti-title">
                                            <h5>Welcome</h5>
                                        </div>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                        <i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>

                            </ul>

                            <ul class="list-inline menu-left mb-0">
                                <li class="float-left">
                                    <button class="button-menu-mobile open-left waves-light waves-effect">
                                        <i class="mdi mdi-menu"></i>
                                    </button>
                                </li>
                            </ul>

                            <div class="clearfix">
                                {{-- <center> --}}
                                    <div class="ml-4">
                                        <div class="row">
                                            <label id="clock" style="font-size: 30px; color: white; 
                                            text-shadow: 4px 4px 10px rgb(0, 0, 0),
                                            2px 2px 7px black,
                                            2px 2px 14px black">
                                            </label>
                                        </div>
                                        <div>
                                            <label style="color: white">Waktu Sekarang</label>
                                        </div>
                                    </div>
                                    
                                    
                                {{-- </center> --}}
                            </div>

                        </nav>

                    </div>
                    <!-- Top Bar End -->

                    <div class="page-content-wrapper ">

                        <div class="container-fluid">
                                @yield('content')
                        </div>


                    </div> <!-- Page content Wrapper -->

                </div> <!-- content -->

                <footer class="footer">
                    © 2020 Muhammad Iqbal 
                </footer>

            </div>
            <!-- End Right content here -->

        </div>
        <!-- END wrapper -->


        <!-- jQuery  -->
        <script src={{asset("assets/js/jquery.min.js")}}></script>
        <script src={{asset("assets/js/popper.min.js")}}></script>
        <script src={{asset("assets/js/bootstrap.min.js")}}></script>
        <script src={{asset("assets/js/modernizr.min.js")}}></script>
        <script src={{asset("assets/js/detect.js")}}></script>
        <script src={{asset("assets/js/fastclick.js")}}></script>
        <script src={{asset("assets/js/jquery.slimscroll.js")}}></script>
        <script src={{asset("assets/js/jquery.blockUI.js")}}></script>
        <script src={{asset("assets/js/waves.js")}}></script>
        <script src={{asset("assets/js/jquery.nicescroll.js")}}></script>
        <script src={{asset("assets/js/jquery.scrollTo.min.js")}}></script>

        <script src={{asset("assets/plugins/skycons/skycons.min.js")}}></script>
        <script src={{asset("assets/plugins/raphael/raphael-min.js")}}></script>
        <script src={{asset("assets/plugins/morris/morris.min.js")}}></script>
        
        <script src={{asset("assets/pages/dashborad.js")}}></script>

        <!-- App js -->
        <script src={{asset("assets/js/app.js")}}></script>
        {{-- <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script> --}}
        {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script> --}}

        {{-- DataTable Baru --}}

        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>

        <!-- Datatable init js -->
        {{-- <script src={{ asset("assets/pages/datatables.init.js") }}></script> --}}

        {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> --}}
        {{-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> --}}
        {{-- <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script> --}}
        {{-- <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script> --}}
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script> --}}
        {{-- <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script> --}}
        {{-- <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script> --}}
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> --}}

        {{-- Sweetalert2 --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	    <script src="sweetalert2.all.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
        <!-- Required datatable js -->
        {{-- <script src={{ asset("assets/plugins/datatables/jquery.dataTables.min.js") }}></script> --}}
        {{-- <script src={{ asset("assets/plugins/datatables/dataTables.bootstrap4.min.js") }}></script> --}}
        <!-- Buttons examples -->
        <script src={{ asset("assets/plugins/datatables/dataTables.buttons.min.js") }}></script>
        <script src={{ asset("assets/plugins/datatables/buttons.bootstrap4.min.js") }}></script>
        <script src={{ asset("assets/plugins/datatables/jszip.min.js") }}></script>
        <script src={{ asset("assets/plugins/datatables/pdfmake.min.js") }}></script>
        <script src={{ asset("assets/plugins/datatables/vfs_fonts.js") }}></script>
        <script src={{ asset("assets/plugins/datatables/buttons.html5.min.js") }}></script>
        <script src={{ asset("assets/plugins/datatables/buttons.print.min.js") }}></script>
        <script src={{ asset("assets/plugins/datatables/buttons.colVis.min.js") }}></script>
        <!-- Responsive examples -->
        <script src={{ asset("assets/plugins/datatables/dataTables.responsive.min.js") }}></script>
        <script src={{ asset("assets/plugins/datatables/responsive.bootstrap4.min.js") }}></script>
        <!-- Datatable init js -->
        {{-- {{-- <script src="assets/pages/datatables.init.js"></script> --}}
        {{-- <script src={{ asset('js/jam.js') }}></script> --}}

        <!-- App js -->
        <script src={{ asset("assets/js/app.js") }}></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'excel', 'pdf', 'print'
                    ]
                });  
            } );
        </script>
        <script>
            $(function() {
                $("#example").DataTable({
                    "responsive": true,
                    "autoWidth": false,
                    "language": {
                        "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                        "sProcessing": "Sedang memproses...",
                        // "sLengthMenu": "Tampilkan MENU data",
                        "sZeroRecords": "Tidak ditemukan data yang sesuai",
                        // "sInfo": "Menampilkan START sampai END dari TOTAL data",
                        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 data",
                        "sInfoFiltered": "(disaring dari MAX data keseluruhan)",
                        "sInfoPostFix": "",
                        "sSearchPlaceholder": "Cari...",
                        "sSearch": "Cari:",
                        "sUrl": "",
                        "oPaginate": {
                            "sFirst": "Pertama",
                            "sPrevious": "Sebelumnya",
                            "sNext": "Selanjutnya",
                            "sLast": "Terakhir"
                        }
                    }
                });
            });
        </script>
        

        <script>
            @if(Session::has('sukses'))
            toastr.success("{{Session::get('sukses')}}", "Selamat")
            @endif
        </script>
        <script>
            @if(Session::has('gagal'))
            toastr.error("{{Session::get('gagal')}}", "Gagal")
            @endif
        </script>
        
	@yield('footer')
    </body>
</html>