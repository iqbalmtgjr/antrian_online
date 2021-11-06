@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">Kelola Loket Pelayanan</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <table id="datatable" class="table table-striped">
                        <a href="" class="btn btn-primary btn-md m-l-15 m-b-15" data-toggle="modal" data-target="#tambah"><i
                                class="fa fa-plus"></i>
                            Tambah Loket Pelayanan</a>
                        @include('kelola_loket_pelayanan/modaltambah')
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Loket Pelayanan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>


                        <tbody>
                            @foreach ($data as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->loket_pelayanan }}</td>
                                    <td>
                                        <a href="#" class="btn btn-danger btn-md delete" id="{{ $data->id }}"><span
                                                class="fa fa-trash"></span> Hapus</a>
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
            Swal.fire({
                    title: 'Yakin?',
                    text: "Mau Hapus Data Dengan Loket Pelayanan Ini ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya',
                })
                .then((result) => {
                    console.log(result);
                    if (result.value) {
                        window.location = "/loket_pelayanan/hapus/" + Id + "";
                    }
                });
        });
    </script>
@endsection
