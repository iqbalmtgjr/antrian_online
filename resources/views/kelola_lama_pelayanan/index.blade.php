@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">Kelola Lama Pelayanan</h4>
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
                            Tambah Lama Pelayanan</a>
                        @include('kelola_lama_pelayanan/modaltambah')
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Lama Pelayanan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>


                        <tbody>
                            @foreach ($data as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->lamapelayanan }} Menit</td>
                                    <td>
                                        <a href="#" onclick="getdata({{ $data->id }})" data-toggle="modal"
                                            data-target="#edit" class="btn btn-success btn-md"> <span
                                                class="fa fa-pencil"></span> Edit</a> <a href="#"
                                            class="btn btn-danger btn-md delete" lama="{{ $data->lama_pelayanan }}"
                                            id="{{ $data->id }}"><span class="fa fa-trash"></span> Hapus</a>
                                    </td>
                                    @include('kelola_lama_pelayanan/modaledit')
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
            var Lama = $(this).attr('lama');
            Swal.fire({
                    title: 'Yakin?',
                    text: "Mau Hapus Data Dengan Lama Pelayanan " + Lama + " ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya',
                })
                .then((result) => {
                    console.log(result);
                    if (result.value) {
                        window.location = "/lama_pelayanan/hapus/" + Id + "";
                    }
                });
        });

    </script>
@endsection
