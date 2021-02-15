<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="tambah" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Koordinator</h5>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/koordinator/input') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" id="role" name="role" value="Koordinator">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">NIP</label>
                        <input type="number" class="form-control" id="NIP" name="NIP" value="{{ old('NIP') }}"
                            placeholder="Masukkan NIP Pegawai ...">
                        @error('NIP')
                            <div class="text-danger ml-3 mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                            placeholder="Masukkan Nama Pegawai ...">
                        @error('name')
                            <div class="text-danger ml-3 mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username"
                            value="{{ old('username') }}" placeholder="Masukkan Username Pegawai ...">
                        @error('username')
                            <div class="text-danger ml-3 mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                            placeholder="Masukkan E-mail Pegawai ...">
                        @error('email')
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
