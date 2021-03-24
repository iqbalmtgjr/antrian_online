<!-- Modal -->
<div class="modal fade" id="rekomendasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Rekomendasi Rata-Rata Waktu Pelayanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="">Filter Waktu Pelayanan</label>
                <form action="/kelola_lama_pelayanan" method="get">
                    <div class="input-group">
                        <input type="date" name="waktu_awal" id="waktu_awal" class="form-control"
                            placeholder="Waktu Awal">
                        <input type="date" name="waktu_akhir" class="form-control" placeholder="Waktu Akhir">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                    <div class="mb-4">
                        <label for="waktu_awal" style="color: Red; font-size:13px" class="mr-5">* Waktu Awal</label>
                        <label for="waktu_akhir" style="color: Red; font-size:13px; margin-left: 65px">*
                            Waktu Akhir</label>
                    </div>
                </form>
                <center>
                    <h6>Rekomendasi</h6>
                </center>
                {{-- @foreach ($laporan as $item)

                    {{ $item->id }}
                @endforeach --}}
                @foreach ($laporan as $item)
                    @php
                        echo $item->lama_pelayanan . '<br>';
                        $convert = strtotime($item->lama_pelayanan);
                        // echo collect($convert)->avg($convert);
                        // echo $rata = App\Models\Laporan::avg('lama_pelayanan', $convert);
                    @endphp
                @endforeach
                @php
                    $rata = App\Models\Laporan::avg('lama_pelayanan', $convert);
                    // echo $average = collect([['foo' => 10], ['foo' => 10], ['foo' => 20], ['foo' => 40]])->avg('foo');
                    // echo $rata = date('H:i:s', App\Models\Laporan::avg('lama_pelayanan', $convert));
                    // echo '<center> <b>' . date('H:i:s', $rata) . '</b></center>';
                @endphp
                <center> <b> {{ date('H:i:s', $rata) }}</b></center>
            </div>
        </div>
    </div>
</div>
