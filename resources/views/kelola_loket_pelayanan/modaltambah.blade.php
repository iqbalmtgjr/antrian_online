<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="tambah" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Loket Pelayanan</h5>
                </button>
            </div>
            <div class="modal-body">
                <form action="/loket_pelayanan/input" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Loket Pelayanan</label>
                        <input type="text" class="form-control" id="loket_pelayanan" name="loket_pelayanan"
                            value="{{ old('loket_pelayanan') }}" placeholder="Masukkan Loket Pelayanan ...">
                        @error('loket_pelayanan')
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
