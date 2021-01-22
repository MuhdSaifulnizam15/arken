<form id="setting-form">
    <div class="card" id="settings-card">
        <div class="card-header">
            <h4>General Settings</h4>
        </div>
        <div class="card-body">
            <p class="text-muted">General settings such as, site name, site title, default address and so on.</p>
            <div class="form-group row align-items-center">
                <label for="site_name" class="form-control-label col-sm-3 text-md-right">Site Name</label>
                <div class="col-sm-6 col-md-9">
                    <input 
                        type="text" 
                        name="site_name" 
                        class="form-control" 
                        id="site_name" 
                        placeholder="Enter site name" 
                        value="{{ config('settings.site_name') }}"
                    />
                </div>
            </div>
            <div class="form-group row align-items-center">
                <label for="site_title" class="form-control-label col-sm-3 text-md-right">Site Title</label>
                <div class="col-sm-6 col-md-9">
                    <input 
                        type="text"
                        class="form-control" 
                        name="site_title" 
                        id="site_title" 
                        placeholder="Enter site title" 
                        value="{{ config('settings.site_title') }}"
                    />
                </div>
            </div>
            <div class="form-group row align-items-center">
                <label for="default_email_address" class="form-control-label col-sm-3 text-md-right">Default Email Address</label>
                <div class="col-sm-6 col-md-9">
                    <input 
                        type="email"
                        class="form-control" 
                        name="default_email_address" 
                        id="default_email_address" 
                        placeholder="Enter store default email address" 
                        value="{{ config('settings.default_email_address') }}"
                    />
                </div>
            </div>
            <div class="form-group row align-items-center">
                <label for="currency_code" class="form-control-label col-sm-3 text-md-right">Currency Code</label>
                <div class="col-sm-6 col-md-9">
                    <input 
                        type="text"
                        class="form-control" 
                        name="currency_code" 
                        id="currency_code" 
                        placeholder="Enter store currency code" 
                        value="{{ config('settings.currency_code') }}"
                    />
                </div>
            </div>
            <div class="form-group row align-items-center">
                <label for="currency_symbol" class="form-control-label col-sm-3 text-md-right">Currency Symbol</label>
                <div class="col-sm-6 col-md-9">
                    <input 
                        type="text"
                        class="form-control" 
                        name="currency_symbol" 
                        id="currency_symbol" 
                        placeholder="Enter store currency symbol" 
                        value="{{ config('settings.currency_symbol') }}"
                    />
                </div>
            </div>
        </div>
        <div class="card-footer bg-whitesmoke text-md-right">
            <button class="btn btn-primary" type="submit" id="save-btn">Save Changes</button>
        </div>
    </div>
</form>