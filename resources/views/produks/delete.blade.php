<!-- resources/views/produks/delete.blade.php -->

<div class="modal fade" id="deleteModal{{ $produk->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $produk->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document" style="margin-top: 20vh">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel{{ $produk->id }}">Delete produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete Produk "{{ $produk->nama }}"?</p>
                <form action="{{ route('produks.destroy', $produk->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
