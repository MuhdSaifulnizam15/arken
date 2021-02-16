<div class="card" id="settings-card">
    <div class="card-header">
        <h4>Attribute Information</h4>
    </div>
    <div class="card-body">
        <div class="form-group row align-items-center">
            <label for="code" class="form-control-label col-sm-3 text-md-right">Code</label>
            <div class="col-sm-6 col-md-9">
                <input 
                    type="text" 
                    name="code" 
                    class="form-control" 
                    id="code" 
                    placeholder="Enter attribute code" 
                    value="{{ $edit ? old('code', $attribute->code) : old('code') }}"
                />
            </div>
        </div>
        <div class="form-group row align-items-center">
            <label for="name" class="form-control-label col-sm-3 text-md-right">Name</label>
            <div class="col-sm-6 col-md-9">
                <input 
                    type="text"
                    class="form-control" 
                    name="name" 
                    id="name" 
                    placeholder="Enter attribute name" 
                    value="{{ $edit ? old('name', $attribute->name) : old('name') }}"
                />
            </div>
        </div>
        @if($edit) 
            <input type="hidden" name="id" value="{{ $attribute->id }}">
        @endif
        <div class="form-group row align-items-center">
            <label for="frontend_type" class="form-control-label col-sm-3 text-md-right">Frontend Type</label>
            <div class="col-sm-6 col-md-9">
                @php $types = ['select' => 'Select Box', 'radio' => 'Radio Button', 'text' => 'Text Field', 'text_area' => 'Text Area']; @endphp
                <select name="frontend_type" id="frontend_type" class="form-control">
                    @foreach($types as $key => $label)
                        <option value="{{ $key }}">{{ $label }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row align-items-center">
            <label for="is_filterable" class="form-control-label col-sm-3 text-md-right">Filterable</label>
            <div class="col-sm-6 col-md-9">
                <input 
                    type="checkbox" 
                    name="is_filterable" 
                    id="is_filterable"
                    style="width:20px;height:20px;"
                    {{ $edit ? $attribute->is_filterable == 1 ? "checked" : "" : "" }}
                />
            </div>
        </div>
        <div class="form-group row align-items-center">
            <label for="is_required" class="form-control-label col-sm-3 text-md-right">Required</label>
            <div class="col-sm-6 col-md-9">
                <input 
                    type="checkbox" 
                    name="is_required" 
                    id="is_required"
                    style="width:20px;height:20px;"
                    {{ $edit ? $attribute->is_required == 1 ? "checked" : "" : "" }}
                />
            </div>
        </div>
    </div>
    <div class="card-footer bg-whitesmoke text-md-right">
        <button class="btn btn-primary" type="submit" id="save-btn">Save Changes</button>
        <a class="btn btn-outline-secondary" href="{{ route('admin.attributes.index') }}"><i class="fas fa-trash mr-2"></i>Cancel</a>
    </div>
</div>