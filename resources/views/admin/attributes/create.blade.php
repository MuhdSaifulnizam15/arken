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
                            @isset($attribute)
                                <li class="nav-item"><a href="#values" class="nav-link" data-toggle="tab">Attribute Values</a></li>
                            @endisset
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="tab-content">
                    <div class="tab-pane active" id="general">
                        <form id="setting-form" action="{{ $edit ? route('admin.attributes.update') : route('admin.attributes.store') }}"  method="POST" role="form">
                        @csrf
                        @include('admin.attributes.includes.general')
                        </form>
                    </div>
                    @isset($attribute)
                        <div class="tab-pane" id="values">
                            @include('admin.attributes.includes.attributeValue')
                        </div>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</section>
@endsection