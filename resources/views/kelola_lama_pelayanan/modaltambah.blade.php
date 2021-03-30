<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="tambah" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Lama Pelayanan</h5>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/lama_pelayanan/input') }}" method="POST">
                    {{ csrf_field() }}
                    {{-- @foreach ($laporan as $item)
                        @php
                            $data = App\models\Laporan::avg('lama_pelayanan', strtotime($item->lama_pelayanan));
                        @endphp
                    @endforeach
                    <center>
                        <h6>Rekomendasi Rata-Rata Waktu Pelayanan Adalah</h6>
                    </center>
                    <center> <b> {{ date('H:i:s', $data) }}</b></center> --}}
                    <div class="form-group">
                        <label for="loket" class="col-form-label">Untuk Loket</label>
                        <select name="loket_pelayanan_id" id="loket" class="form-control">
                            <option value="">--Pilih Loket--</option>
                            @foreach ($loket as $item)
                                <option value="{{ $item->id }}">{{ $item->loket_pelayanan }}</option>
                            @endforeach
                        </select>
                        @error('loket_pelayanan_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Lama Pelayanan</label>
                        <input type="string" placeholder="Jam:menit:detik" class="form-control" id="lamapelayanan"
                            name="lamapelayanan" value="{{ old('lamapelayanan') }}">
                        <p style="font-size: 13px; color: red">*Dalam Menit</p>
                        @error('lamapelayanan')
                            <div class="text-danger ml-3 mt-2">
                                {{ $message }}
                            </div>
                        @enderror
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
