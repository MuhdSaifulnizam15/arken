<form id="setting-form" action="{{ route('admin.settings.update') }}"  method="POST" role="form">
    @csrf
    <div class="card" id="settings-card">
        <div class="card-header">
            <h4>Analytics</h4>
        </div>
        <div class="card-body">
            <div class="form-group row align-items-center">
                <label for="google_analytics" class="form-control-label col-sm-3 text-md-right">Google Analytics Code</label>
                <div class="col-sm-6 col-md-9">
                    <textarea  
                        rows="4"
                        name="google_analytics" 
                        class="form-control" 
                        id="google_analytics" 
                        placeholder="Enter google analytics code" 
                        value="{{ config('settings.google_analytics') }}"
                    ></textarea>
                </div>
            </div>
            <div class="form-group row align-items-center">
                <label for="facebook_pixels" class="form-control-label col-sm-3 text-md-right">Facebook Pixel Code</label>
                <div class="col-sm-6 col-md-9">
                    <textarea  
                        rows="4"
                        name="facebook_pixels" 
                        class="form-control" 
                        id="facebook_pixels" 
                        placeholder="Enter facebook pixel code" 
                        value="{{ config('settings.facebook_pixels') }}"
                    ></textarea>
                </div>
            </div>
        </div>
        <div class="card-footer bg-whitesmoke text-md-right">
            <button class="btn btn-primary" type="submit" id="save-btn">Save Changes</button>
        </div>
    </div>
</form>