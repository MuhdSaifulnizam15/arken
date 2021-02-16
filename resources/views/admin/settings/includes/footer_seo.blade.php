<form id="setting-form" action="{{ route('admin.settings.update') }}"  method="POST" role="form">
    @csrf
    <div class="card" id="settings-card">
        <div class="card-header">
            <h4>Footer &amp; SEO</h4>
        </div>
        <div class="card-body">
            <p class="text-muted">Footer and SEO related description</p>
            <div class="form-group row align-items-center">
                <label for="footer_copyright_text" class="form-control-label col-sm-3 text-md-right">Footer Copyright Text</label>
                <div class="col-sm-6 col-md-9">
                    <textarea  
                        rows="4"
                        name="footer_copyright_text" 
                        class="form-control" 
                        id="footer_copyright_text" 
                        placeholder="Enter footer copyright text" 
                        value="{{ config('settings.footer_copyright_text') }}"
                    ></textarea>
                </div>
            </div>
            <div class="form-group row align-items-center">
                <label for="seo_meta_title" class="form-control-label col-sm-3 text-md-right">SEO Meta Title</label>
                <div class="col-sm-6 col-md-9">
                    <input 
                        type="text"
                        class="form-control" 
                        name="seo_meta_title" 
                        id="seo_meta_title" 
                        placeholder="Enter seo meta title for store" 
                        value="{{ config('settings.seo_meta_title') }}"
                    />
                </div>
            </div>
            <div class="form-group row align-items-center">
                <label for="seo_meta_description" class="form-control-label col-sm-3 text-md-right">SEO Meta Description</label>
                <div class="col-sm-6 col-md-9">
                    <textarea  
                        rows="4"
                        name="seo_meta_description" 
                        class="form-control" 
                        id="seo_meta_description" 
                        placeholder="Enter seo meta description for store" 
                        value="{{ config('settings.seo_meta_description') }}"
                    ></textarea>
                </div>
            </div>
        </div>
        <div class="card-footer bg-whitesmoke text-md-right">
            <button class="btn btn-primary" type="submit" id="save-btn">Save Changes</button>
        </div>
    </div>
</form>