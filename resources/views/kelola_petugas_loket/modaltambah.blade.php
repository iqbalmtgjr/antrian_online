<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="tambah" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Petugas Loket</h5>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/petugas/input') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" id="role" name="role" value="Petugas">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">NIP</label>
                        <input type="number" class="form-control" id="NIP" name="NIP" value="{{ old('NIP') }}"
                            placeholder="Masukkan NIP Petugas ...">
                        @error('NIP')
                            <div class="text-danger ml-3 mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                            placeholder="Masukkan Nama Petugas ...">
                        @error('nama')
                            <div class="text-danger ml-3 mt-2">
                                {{ $message }}`
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username"
                            value="{{ old('username') }}" placeholder="Masukkan Username Petugas ...">
                        @error('username')
                            <div class="text-danger ml-3 mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                            placeholder="Masukkan E-mail Petugas ...">
                        @error('email')
                            <div class="text-danger ml-3 mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="loket" class="col-form-label">Penugasan Loket</label>
                        <select onclick="proses()" name="loket_pelayanan_id" id="loket" class="form-control">
                            <option value="">--Pilih Loket--</option>
                            <option value="0">Loket Antrian</option>
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
                    {{-- <div class="form-group" id="hasil"></div>
                    <script>
                        function proses() {
                            var proces = document.getElementById("loket").value;
                            console.log(proces);
                            if (proces == 1 || proces == "") {
                                console.log('null');
                                document.getElementById("hasil").innerHTML = "";
                            } else {
                                document.getElementById("hasil").innerHTML =
                                    '<label for="loket_pelayanan_id" class="col-form-label">Loket Pelayanan</label> <select name="loket_pelayanan_id" class="form-control"><option>--Pilih Loket--</option><option value="1">Loket A</option><option value="2">Loket B</option><option value="3">Loket C</option><option value="4">Loket D</option></select>';
                            }
                        }
                    </script> --}}
                    {{-- <form>
                        Silahkan pilih tujuan anda:
                        <select id="tujuan" name="tujuan" onchange="proses()">
                            <option value="" selected>Pilih Tujuan Anda</option>
                            <option value="Rp. 10.000,-">Banyuwangi</option>
                            <option value="Rp. 150.000,-">Jakarta</option>
                            <option value="Rp. 75.000,-">Surabaya</option>
                        </select>

                        Harga Tiket : <input type="text" name="harga" id="harga" />
                    </form>
                    <script>
                        function proses() {
                            var harga = document.getElementById("tujuan").value;
                            document.getElementById("harga").value = harga;
                        }

                    </script> --}}
                    {{-- <div class="form-group" id="tampil">
                        <label for="loket_pelayanan_id" class="col-form-label">Loket Pelayanan</label>
                        <select name="loket_pelayanan_id" id="loket_pelayanan_id"
                            class="form-control @error('loket_pelayanan_id') is-invalid @enderror"
                            value="{{ old('loket_pelayanan_id') }}">
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
                    </div> --}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
