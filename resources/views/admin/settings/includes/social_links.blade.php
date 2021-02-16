<form id="setting-form" action="{{ route('admin.settings.update') }}"  method="POST" role="form">
    @csrf
    <div class="card" id="settings-card">
        <div class="card-header">
            <h4>Social Links</h4>
        </div>
        <div class="card-body">
            <p class="text-muted">Social Links such as, facebook, twitter, instagram and linkedIn.</p>
            <div class="form-group row align-items-center">
                <label for="social_facebook" class="form-control-label col-sm-3 text-md-right">Facebook Profile</label>
                <div class="col-sm-6 col-md-9">
                    <input 
                        type="text" 
                        name="social_facebook" 
                        class="form-control" 
                        id="social_facebook" 
                        placeholder="Enter facebook profile link" 
                        value="{{ config('settings.social_facebook') }}"
                    />
                </div>
            </div>
            <div class="form-group row align-items-center">
                <label for="social_twitter" class="form-control-label col-sm-3 text-md-right">Twitter Profile</label>
                <div class="col-sm-6 col-md-9">
                    <input 
                        type="text"
                        class="form-control" 
                        name="social_twitter" 
                        id="social_twitter" 
                        placeholder="Enter twitter profile link" 
                        value="{{ config('settings.social_twitter') }}"
                    />
                </div>
            </div>
            <div class="form-group row align-items-center">
                <label for="social_instagram" class="form-control-label col-sm-3 text-md-right">Instagram Profile</label>
                <div class="col-sm-6 col-md-9">
                    <input 
                        type="text"
                        class="form-control" 
                        name="social_instagram" 
                        id="social_instagram" 
                        placeholder="Enter instagram profile link" 
                        value="{{ config('settings.social_instagram') }}"
                    />
                </div>
            </div>
            <div class="form-group row align-items-center">
                <label for="social_linkedin" class="form-control-label col-sm-3 text-md-right">LinkedIn Profile</label>
                <div class="col-sm-6 col-md-9">
                    <input 
                        type="text"
                        class="form-control" 
                        name="social_linkedin" 
                        id="social_linkedin" 
                        placeholder="Enter linkedin profile link" 
                        value="{{ config('settings.social_linkedin') }}"
                    />
                </div>
            </div>
        </div>
        <div class="card-footer bg-whitesmoke text-md-right">
            <button class="btn btn-primary" type="submit" id="save-btn">Save Changes</button>
        </div>
    </div>
</form>