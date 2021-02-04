<div class="card" id="settings-card">
    <div class="card-header">
        <h4>Product Information</h4>
    </div>
    <div class="card-body">
        @if($edit) 
            <input type="hidden" name="id" value="{{ $product->id }}">
        @endif
        <div class="form-group row align-items-center">
            <label for="name" class="form-control-label col-sm-3 text-md-right">Name</label>
            <div class="col-sm-6 col-md-9">
                <input 
                    type="text" 
                    name="name" 
                    class="form-control" 
                    id="name" 
                    placeholder="Enter product name" 
                    value="{{ $edit ? old('name', $product->name) : old('name') }}"
                />
            </div>
        </div>
        <div class="form-group row align-items-center">
            <label for="sku" class="form-control-label col-sm-3 text-md-right">SKU</label>
            <div class="col-sm-6 col-md-9">
                <input 
                    type="text"
                    class="form-control" 
                    name="sku" 
                    id="sku" 
                    placeholder="Enter product sku" 
                    value="{{ $edit ? old('sku', $product->sku) : old('sku') }}"
                />
            </div>
        </div>
        <div class="form-group row align-items-center">
            <label for="brand_id" class="form-control-label col-sm-3 text-md-right">Brand</label>
            <div class="col-sm-6 col-md-9">
                <select name="brand_id" id="brand_id" class="form-control">
                <option value="0" selected>Select a brand</option>
                    @foreach($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="card-footer bg-whitesmoke text-md-right">
        <button class="btn btn-primary" type="submit" id="save-btn">Save Changes</button>
        <a class="btn btn-outline-secondary" href="{{ route('admin.products.index') }}"><i class="fas fa-trash mr-2"></i>Cancel</a>
    </div>
</div>