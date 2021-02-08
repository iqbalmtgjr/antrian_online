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
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Lama Pelayanan</label>
                        <input type="time" class="form-control" id="lama_pelayanan" name="lama_pelayanan"
                            value="{{ old('lama_pelayanan') }}">
                        @error('lama_pelayanan')
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