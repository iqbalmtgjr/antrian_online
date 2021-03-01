<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Lama Pelayanan</h5>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/lama_pelayanan/update') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="idd" name="id" value="" readonly>
                        <input type="hidden" class="form-control" id="url_getdata" name="url_getdata"
                            value="{{ url('getdata_lamapelayanan/') }}" readonly>
                        <label for="recipient-name" class="col-form-label">Lama Pelayanan</label>
                        <input type="number" class="form-control" id="lamapelayanann" name="lamapelayanan"
                            value="{{ old('lamapelayanan') }}">
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
