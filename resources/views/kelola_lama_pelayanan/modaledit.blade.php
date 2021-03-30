<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Lama Pelayanan</h5>
                </button>
            </div>
            <div class="modal-body">
                <label for="">Filter Waktu Pelayanan</label>
                <form action="/kelola_lama_pelayanan" method="get">
                    <div class="input-group">
                        <input type="date" name="waktu_awal" id="waktu_awal" class="form-control"
                            placeholder="Waktu Awal">
                        <input type="date" name="waktu_akhir" class="form-control" placeholder="Waktu Akhir">
                        <button class="btn btn-primary" type="submit">Pilih</button>
                    </div>
                    <div class="mb-4">
                        <label for="waktu_awal" style="color: Red; font-size:13px" class="mr-5">* Waktu Awal</label>
                        <label for="waktu_akhir" style="color: Red; font-size:13px; margin-left: 65px">*
                            Waktu Akhir</label>
                    </div>
                </form>
                @if ($laporan->count() == 0)
                    <center>
                        <h6 style="color: red">" Data Antrian Masih Kosong "</h6>
                    </center>
                @else
                    <center>
                        <h6>Rata-Rata Waktu Pelayanan Saat ini</h6>
                    </center>
                @endif
                @php
                    // $timezone = 'Asia/Jakarta';
                    // $date = new DateTime('now', new DateTimeZone($timezone));
                    $totaltime = 0;
                    foreach ($laporan as $item) {
                        // dd($item);
                        $timestamp = strtotime($item->lama_pelayanan);
                        $totaltime += $timestamp;
                        // $data = $item->lama_pelayanan;
                        // $convert = strtotime($item->lama_pelayanan);
                        // echo $average = date('H:i:s', collect($laporan)->avg('lama_pelayanan'));
                        // echo $average = $data->avg();
                    }
                    // echo count($laporan);
                    if ($laporan->count() == 0) {
                    } else {
                        $average = $totaltime / count($laporan);
                    }
                    
                    if ($laporan->count() == 0) {
                        # code...
                    } else {
                        echo '<center><b>' . date('H:i:s', $average) . '</b></center>';
                    }
                    
                @endphp
                <form action="{{ url('/lama_pelayanan/update') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="idd" name="id" value="" readonly>
                        <input type="hidden" class="form-control" id="url_getdata" name="url_getdata"
                            value="{{ url('getdata_lamapelayanan/') }}" readonly>
                        @if ($laporan->count() == 0)

                        @else
                            <label for="recipient-name" class="col-form-label">Lama Pelayanan</label>
                            <input type="time" class="form-control" id="" name="lamapelayanan"
                                value="{{ date('H:i:s', $average) }}">
                            <p style="font-size: 13px; color: red">*Dalam Menit</p>
                            @error('lamapelayanan')
                                <div class="text-danger ml-3 mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        @endif
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function getdata(id) {
        console.log(id)
        var url = $('#url_getdata').val() + '/' + id
        console.log(url);

        $.ajax({
            url: url,
            cache: false,
            success: function(response) {
                console.log(response);
                // console.log(response.lamapelayanan);

                $('#id').val(id);
                $('#idd').val(response.id);
                $('#lamapelayanann').val(response.lamapelayanan);

            }
        });
    }

</script>
