@extends('admin.layouts.app')

@section('title') {{ $pageTitle }} @endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>{{ $pageTitle }}</h1>
    </div>

    @include('admin.partials.flash')
  
    <div class="section-body">
        <div class="row">
        <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Jump To</h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item"><a href="#general" class="nav-link active" data-toggle="tab">General</a></li>
                            <li class="nav-item"><a href="#images" class="nav-link" data-toggle="tab">Images</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="tab-content">
                    <div class="tab-pane active" id="general">
                        <form id="setting-form" action="{{ $edit ? route('admin.products.update') : route('admin.products.store') }}"  method="POST" role="form">
                        @csrf
                        @include('admin.products.includes.general')
                        </form>
                    </div>
                    <div class="tab-pane" id="images">
                        @include('admin.products.includes.images')
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection