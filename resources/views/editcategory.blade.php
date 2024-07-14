<div class="modal fade" id="ModalEdit{{ $item->id }}" role="dialog"
    tabindex="-1" aria-labelledby="ModalEditLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalEditLabel{{ $item->id }}">Edit Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <!-- Form edit kategori -->
                <form method="POST" action="{{ route('updatecategory', $item->id) }}">
                    @csrf
                    @method('PUT')
                    <!-- Form fields -->
                    <div class="form-group">
                        {{-- <label for="editGudang{{ $item->id }}" class="control-label mb-1">Gudang</label> --}}
                        <input type="text" id="editGudang" name="gudang" class="form-control" value="{{ $item->gudang }}" required>
                        @error('gudang')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm rounded">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- <form action="{{ route('updatecategory', $item->id) }}" method="post" enctype="multipart/form-data">
    {{ method_field('PUT') }}
    {{ csrf_field() }}
    <div class="modal fade text-left" id="ModalEdit{{$item->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Edit Kategori') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Gudang') }}:</strong>
                            <input type="text" id="editGudang{{ $item->id }}" name="gudang" class="form-control" value="{{ $item->gudang }}" required>
                            @error('gudang')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <button type="submit" class="btn btn-warning">{{ __('Simpan perubahan') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form> --}}

