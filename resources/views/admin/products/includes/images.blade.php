<div class="card" id="settings-card">
    <div class="card-header">
        <h4>Upload Image</h4>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.products.dropzone.store') }}" class="dropzone" id="dropzone" enctype="multipart/form-data">
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            {{ csrf_field() }}
        </form>
    </div>
    <div class="card-footer bg-whitesmoke text-md-right">
        <button class="btn btn-primary" type="button" id="uploadButton">Upload Images</button>
        <a class="btn btn-outline-secondary" href="{{ route('admin.products.index') }}"><i class="fas fa-trash mr-2"></i>Cancel</a>
    </div>
    @if ($product->images)
        <hr>
        <div class="row">
            @foreach($product->images as $image)
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ asset('storage/'.$image->full) }}" id="brandLogo" class="img-fluid" alt="img">
                            <a class="card-link float-right text-danger delete-image" id="{{ $image->id }}">
                                <i class="fa fa-fw fa-lg fa-trash"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>