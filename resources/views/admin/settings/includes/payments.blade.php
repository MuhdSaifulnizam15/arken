<form id="setting-form" action="{{ route('admin.settings.update') }}"  method="POST" role="form">
    @csrf
    <div class="card" id="settings-card">
        <div class="card-header">
            <h4>Payment Settings</h4>
        </div>
        <div class="card-body">
            <div class="form-group row align-items-center">
                <label for="stripe_payment_method" class="form-control-label col-sm-3 text-md-right">Stripe Payment Method</label>
                <div class="col-sm-6 col-md-9">
                    <select name="stripe_payment_method" id="stripe_payment_method" class="form-control select2">
                        <option value="1" {{ (config('settings.stripe_payment_method')) == 1 ? 'selected' : '' }}>Enabled</option>
                        <option value="0" {{ (config('settings.stripe_payment_method')) == 0 ? 'selected' : '' }}>Disabled</option>
                    </select>
                </div>
            </div>

            <div class="form-group row align-items-center">
                <label for="stripe_key" class="form-control-label col-sm-3 text-md-right">Key</label>
                <div class="col-sm-6 col-md-9">
                    <input 
                        type="text" 
                        name="stripe_key" 
                        class="form-control" 
                        id="stripe_key" 
                        placeholder="Enter stripe key" 
                        value="{{ config('settings.stripe_key') }}"
                    />
                </div>
            </div>

            <div class="form-group row align-items-center pb-2">
                <label for="stripe_secret_key" class="form-control-label col-sm-3 text-md-right">Secret Key</label>
                <div class="col-sm-6 col-md-9">
                    <input 
                        type="text" 
                        name="stripe_secret_key" 
                        class="form-control" 
                        id="stripe_secret_key" 
                        placeholder="Enter stripe secret key" 
                        value="{{ config('settings.stripe_secret_key') }}"
                    />
                </div>
            </div>

            <div class="form-group row align-items-center">
                <label for="paypal_payment_method" class="form-control-label col-sm-3 text-md-right">PayPal Payment Method</label>
                <div class="col-sm-6 col-md-9">
                    <select name="paypal_payment_method" id="paypal_payment_method" class="form-control select2">
                        <option value="1" {{ (config('settings.paypal_payment_method')) == 1 ? 'selected' : '' }}>Enabled</option>
                        <option value="0" {{ (config('settings.paypal_payment_method')) == 0 ? 'selected' : '' }}>Disabled</option>
                    </select>
                </div>
            </div>

            <div class="form-group row align-items-center">
                <label for="paypal_client_id" class="form-control-label col-sm-3 text-md-right">Client ID</label>
                <div class="col-sm-6 col-md-9">
                    <input 
                        type="text" 
                        name="paypal_client_id" 
                        class="form-control" 
                        id="paypal_client_id" 
                        placeholder="Enter paypal client Id" 
                        value="{{ config('settings.paypal_client_id') }}"
                    />
                </div>
            </div>

            <div class="form-group row align-items-center pb-2">
                <label for="paypal_secret_id" class="form-control-label col-sm-3 text-md-right">Secret ID</label>
                <div class="col-sm-6 col-md-9">
                    <input 
                        type="text" 
                        name="paypal_secret_id" 
                        class="form-control" 
                        id="paypal_secret_id" 
                        placeholder="Enter paypal secret id" 
                        value="{{ config('settings.paypal_secret_id') }}"
                    />
                </div>
            </div>
        </div>
        <div class="card-footer bg-whitesmoke text-md-right">
            <button class="btn btn-primary" type="submit" id="save-btn">Save Changes</button>
        </div>
    </div>
</form>