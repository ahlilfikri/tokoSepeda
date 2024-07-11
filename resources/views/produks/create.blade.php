<!-- resources/views/produks/create.blade.php -->

<div class="modal fade @if ($errors->any()) show @endif" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true" @if ($errors->any()) style="display: block;" @endif>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Tambah Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('produks.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama Produk:</label>
                        <input type="text" name="nama" class="form-control @if($errors->has('nama')) is-invalid @endif" value="{{ old('nama') }}" required>
                        @if ($errors->has('nama'))
                            <div class="invalid-feedback">{{ $errors->first('nama') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="jenis">Jenis Produk:</label>
                        <input type="text" name="jenis" class="form-control @if($errors->has('jenis')) is-invalid @endif" value="{{ old('jenis') }}" required>
                        @if ($errors->has('jenis'))
                            <div class="invalid-feedback">{{ $errors->first('jenis') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga Produk:</label>
                        <input type="number" name="harga" class="form-control @if($errors->has('harga')) is-invalid @endif" value="{{ old('harga') }}" required>
                        @if ($errors->has('harga'))
                            <div class="invalid-feedback">{{ $errors->first('harga') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock Produk:</label>
                        <input type="number" name="stock" class="form-control @if($errors->has('stock')) is-invalid @endif" value="{{ old('stock') }}" required>
                        @if ($errors->has('stock'))
                            <div class="invalid-feedback">{{ $errors->first('stock') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="image">Gambar:</label>
                        <input type="file" name="image" class="form-control @if($errors->has('image')) is-invalid @endif" required>
                        @if ($errors->has('image'))
                            <div class="invalid-feedback">{{ $errors->first('image') }}</div>
                        @endif
                    </div>
                    <button type="submit" class="btn bg-custom-color text-light my-3">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

@if ($errors->any())
    <script>
        $(document).ready(function() {
            $('#createModal').modal('show');
        });
    </script>
@endif
