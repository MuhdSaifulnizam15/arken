<form id="setting-form" action="{{ route('admin.settings.update') }}"  method="POST" role="form">
    @csrf
    <div class="card" id="settings-card">
        <div class="card-header">
            <h4>Site Logo</h4>
        </div>
        <div class="card-body">
            <p class="text-muted">Site logo and favicons</p>
            <div class="form-group row align-items-center mb-2">
                <label class="form-control-label col-sm-3 text-md-right">Current Site Logo</label>
                <div class="col-sm-6 col-md-9">
                    @if (config('settings.site_logo') != null)
                        <img src="{{ asset('storage/'.config('settings.site_logo')) }}" id="logoImg" style="width: 80px; height: auto;">
                    @else
                        <img src="https://via.placeholder.com/80x80?text=Placeholder+Image" id="logoImg" style="width: 80px; height: auto;">
                    @endif
                </div>
            </div>
            <div class="form-group row align-items-center">
                <label class="form-control-label col-sm-3 text-md-right">Site Logo</label>
                <div class="col-sm-6 col-md-9">
                    <div class="custom-file">
                        <input type="file" name="site_logo" class="custom-file-input form-control" id="site-logo" onchange="loadFile(event,'logoImg')" />
                        <label class="custom-file-label">Choose File</label>
                    </div>
                    <div class="form-text text-muted">The image must have a maximum size of 1MB</div>
                </div>
            </div>
            <div class="form-group row align-items-center mb-2">
                <label class="form-control-label col-sm-3 text-md-right">Current Favicon Logo</label>
                <div class="col-sm-6 col-md-9">
                    @if (config('settings.site_favicon') != null)
                        <img src="{{ asset('storage/'.config('settings.site_favicon')) }}" id="faviconImg" style="width: 80px; height: auto;">
                    @else
                        <img src="https://via.placeholder.com/80x80?text=Placeholder+Image" id="faviconImg" style="width: 80px; height: auto;">
                    @endif
                </div>
            </div>
            <div class="form-group row align-items-center">
                <label class="form-control-label col-sm-3 text-md-right">Favicon</label>
                <div class="col-sm-6 col-md-9">
                    <div class="custom-file">
                        <input type="file" name="site_favicon" class="custom-file-input" id="site-favicon" onchange="loadFile(event,'faviconImg')"/>
                        <label class="custom-file-label">Choose File</label>
                    </div>
                    <div class="form-text text-muted">The image must have a maximum size of 1MB</div>
                </div>
            </div>
        </div>
        <div class="card-footer bg-whitesmoke text-md-right">
            <button class="btn btn-primary" type="submit" id="save-btn">Save Changes</button>
        </div>
    </div>
</form>

@push('scripts')
    <script>
        loadFile = function(event, id) {
            var output = document.getElementById(id);
            output.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
@endpush