@extends('admin.layouts.app')

@section('title') {{ $pageTitle }} @endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>{{ $pageTitle }}</h1>
    </div>

    @include('admin.partials.flash')
    
    <div class="section-body">
        <h2 class="section-title">All About General Settings</h2>
        <p class="section-lead">
            You can adjust all general settings here
        </p>

        <!-- <div id="output-status"></div> -->
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Jump To</h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item"><a href="#general" class="nav-link active" data-toggle="tab">General</a></li>
                            <li class="nav-item"><a href="#site-logo" class="nav-link" data-toggle="tab">Site Logo</a></li>
                            <li class="nav-item"><a href="#footer-seo" class="nav-link" data-toggle="tab">Footer &amp; SEO</a></li>
                            <li class="nav-item"><a href="#social-links" class="nav-link" data-toggle="tab">Social Links</a></li>
                            <li class="nav-item"><a href="#analytics" class="nav-link" data-toggle="tab">Analytics</a></li>
                            <li class="nav-item"><a href="#payments" class="nav-link" data-toggle="tab">Payments</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="tab-content">
                    <div class="tab-pane active" id="general">
                        @include('admin.settings.includes.general')
                    </div>
                    <div class="tab-pane fade" id="site-logo">
                        @include('admin.settings.includes.logo')
                    </div>
                    <div class="tab-pane fade" id="footer-seo">
                        @include('admin.settings.includes.footer_seo')
                    </div>
                    <div class="tab-pane fade" id="social-links">
                        @include('admin.settings.includes.social_links')
                    </div>
                    <div class="tab-pane fade" id="analytics">
                        @include('admin.settings.includes.analytics')
                    </div>
                    <div class="tab-pane fade" id="payments">
                        @include('admin.settings.includes.payments')
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection