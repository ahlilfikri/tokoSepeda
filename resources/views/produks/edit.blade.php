<!-- resources/views/produks/edit.blade.php -->

<div class="modal fade" id="editModal{{ $produk->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $produk->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{ $produk->id }}">Edit Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('produks.update', $produk->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama">Nama Produk:</label>
                        <input type="text" name="nama" class="form-control" value="{{ old('nama', $produk->nama) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="jenis">Jenis Produk:</label>
                        <input type="text" name="jenis" class="form-control" value="{{ old('nama', $produk->jenis) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga Produk:</label>
                        <input type="number" name="harga" class="form-control" value="{{ old('harga', $produk->harga) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock Produk:</label>
                        <input type="number" name="stock" class="form-control" value="{{ old('stock', $produk->stock) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Gambar:</label>
                        <input type="file" name="image" class="form-control" value="{{ old('image', $produk->image) }}" required>
                    </div>
                    <button type="submit" class="btn bg-custom-color text-light my-3">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
