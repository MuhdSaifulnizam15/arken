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
                    class="form-control @error('name') is-invalid @enderror" 
                    id="name" 
                    placeholder="Enter product name" 
                    value="{{ $edit ? old('name', $product->name) : old('name') }}"
                />
                <div class="invalid-feedback active">
                    <i class="fa fa-exclamation-circle fa-fw"></i> @error('name') <span>{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <div class="form-group row align-items-center">
            <label for="sku" class="form-control-label col-sm-3 text-md-right">SKU</label>
            <div class="col-sm-6 col-md-9">
                <input 
                    type="text"
                    class="form-control @error('sku') is-invalid @enderror" 
                    name="sku" 
                    id="sku" 
                    placeholder="Enter product sku" 
                    value="{{ $edit ? old('sku', $product->sku) : old('sku') }}"
                />
                <div class="invalid-feedback active">
                    <i class="fa fa-exclamation-circle fa-fw"></i> @error('sku') <span>{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <div class="form-group row align-items-center">
            <label for="brand_id" class="form-control-label col-sm-3 text-md-right">Brand</label>
            <div class="col-sm-6 col-md-9">
                <select name="brand_id" id="brand_id" class="form-control @error('brand_id') is-invalid @enderror"">
                <option value="0" selected>Select a brand</option>
                    @foreach($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback active">
                    <i class="fa fa-exclamation-circle fa-fw"></i> @error('brand_id') <span>{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <div class="form-group row align-items-center">
            <label for="categories" class="form-control-label col-sm-3 text-md-right">Categories</label>
            <div class="col-sm-6 col-md-9">
                <select name="categories[]" id="categories" class="form-control select2" multiple="">
                    @foreach($categories  as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row align-items-center">
            <label for="price" class="form-control-label col-sm-3 text-md-right">Price</label>
            <div class="col-sm-6 col-md-9">
                <input 
                    type="text"
                    class="form-control @error('price') is-invalid @enderror" 
                    name="price" 
                    id="price" 
                    placeholder="Enter product price" 
                    value="{{ $edit ? old('price', $product->price) : old('price') }}"
                />
                <div class="invalid-feedback active">
                    <i class="fa fa-exclamation-circle fa-fw"></i> @error('price') <span>{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <div class="form-group row align-items-center">
            <label for="special_price" class="form-control-label col-sm-3 text-md-right">Special Price</label>
            <div class="col-sm-6 col-md-9">
                <input 
                    type="text"
                    class="form-control" 
                    name="special_price" 
                    id="special_price" 
                    placeholder="Enter product special price" 
                    value="{{ $edit ? old('special_price', $product->special_price) : old('special_price') }}"
                />
            </div>
        </div>
        <div class="form-group row align-items-center">
            <label for="quantity" class="form-control-label col-sm-3 text-md-right">Quantity</label>
            <div class="col-sm-6 col-md-9">
                <input 
                    type="number"
                    class="form-control @error('quantity') is-invalid @enderror" 
                    name="quantity" 
                    id="quantity" 
                    placeholder="Enter product quantity" 
                    value="{{ $edit ? old('quantity', $product->quantity) : old('quantity') }}"
                />
                <div class="invalid-feedback active">
                    <i class="fa fa-exclamation-circle fa-fw"></i> @error('quantity') <span>{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <div class="form-group row align-items-center">
            <label for="weight" class="form-control-label col-sm-3 text-md-right">Weight</label>
            <div class="col-sm-6 col-md-9">
                <input 
                    type="text"
                    class="form-control" 
                    name="weight" 
                    id="weight" 
                    placeholder="Enter product weight" 
                    value="{{ $edit ? old('weight', $product->weight) : old('weight') }}"
                />
            </div>
        </div>
        <div class="form-group row align-items-center">
            <label for="description" class="form-control-label col-sm-3 text-md-right">Description</label>
            <div class="col-sm-6 col-md-9">
                <textarea  
                    rows="4"
                    name="description" 
                    class="form-control" 
                    id="description" 
                    rows="8"
                    placeholder="Enter description" 
                    value="{{ $edit ? old('description', $product->description) : old('description') }}"
                ></textarea>
            </div>
        </div>
        <div class="form-group row align-items-center">
            <label for="status" class="form-control-label col-sm-3 text-md-right">Status</label>
            <div class="col-sm-6 col-md-9">
                <input 
                    type="checkbox" 
                    name="status" 
                    id="status"
                    style="width:20px;height:20px;"
                    {{ $edit ? $attribute->status == 1 ? "checked" : "" : "" }}
                />
            </div>
        </div>
        <div class="form-group row align-items-center">
            <label for="featured" class="form-control-label col-sm-3 text-md-right">Featured</label>
            <div class="col-sm-6 col-md-9">
                <input 
                    type="checkbox" 
                    name="featured" 
                    id="featured"
                    style="width:20px;height:20px;"
                    {{ $edit ? $attribute->featured == 1 ? "checked" : "" : "" }}
                />
            </div>
        </div>
    </div>
    <div class="card-footer bg-whitesmoke text-md-right">
        <button class="btn btn-primary" type="submit" id="save-btn">Save Changes</button>
        <a class="btn btn-outline-secondary" href="{{ route('admin.products.index') }}"><i class="fas fa-trash mr-2"></i>Cancel</a>
    </div>
</div>