@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">Kelola Data Petugas Loket</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <table id="datatable" class="table table-striped">
                        <a href="" class="btn btn-primary btn-md m-l-15 m-b-15" data-toggle="modal" data-target="#tambah"><i
                                class="fa fa-user-plus"></i>
                            Tambah</a>
                        @include('kelola_petugas_loket/modaltambah')
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Penugasan Loket</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>


                        <tbody>
                            @foreach ($data as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->NIP }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->username }}</td>
                                    <td>{{ $data->user->email }}</td>
                                    @if ($data->loket_pelayanan_id == 0)
                                        <td>Petugas Antrian</td>
                                    @else
                                        <td>{{ $data->loket->loket_pelayanan }}</td>
                                    @endif
                                    <td>
                                        <a href="#" id="{{ $data->user->id }}" NIP="{{ $data->NIP }}"
                                            class="btn btn-success btn-md resetpassword"><span class="fa fa-key"></span>
                                            Reset
                                            Password</a>
                                        <a href="#" class="btn btn-danger btn-md delete" NIP="{{ $data->NIP }}"
                                            id="{{ $data->user->id }}"><span class="fa fa-trash"></span> Hapus</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')

    <script>
        $('.delete').click(function() {
            var Id = $(this).attr('id');
            var NIP = $(this).attr('NIP');
            Swal.fire({
                    title: 'Yakin?',
                    text: "Mau Hapus Data Dengan NIP " + NIP + "?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya',
                })
                .then((result) => {
                    console.log(result);
                    if (result.value) {
                        window.location = "/petugas/hapus/" + Id + "";
                    }
                });
        });

        $('.resetpassword').click(function() {
            var Id = $(this).attr('id');
            var NIP = $(this).attr('NIP');
            Swal.fire({
                    title: 'Yakin?',
                    text: "Mau Reset Password Petugas Dengan NIP " + NIP + "?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya',
                })
                .then((result) => {
                    console.log(result);
                    if (result.value) {
                        window.location = "/resetpassword/petugas/" + Id + "";
                    }
                });
        });

    </script>
@endsection
