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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ $subTitle }}</h4>
                    </div>
                    <form action="{{ route('admin.brands.update') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name <span class="m-l-5 text-danger"> *</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name', $brand->name) }}">
                                <input type="hidden" name="id" value="{{ $brand->id }}">
                                @error('name') {{ $message }} @enderror
                            </div>

                            <div class="form-group">
                                <div class="col-md-2">
                                    @if ($brand->logo != null)
                                        <figure class="mt-2" style="width: 80px; height: auto;">
                                            <img src="{{ asset('storage/'. $brand->logo) }}" id="brandImage" class="img-fluid" alt="img">
                                        </figure>
                                    @endif
                                </div>
                                <div class="col-md-10">
                                    <label>Brand Logo</label>
                                    <div class="custom-file">
                                        <input type="file" name="logo" class="custom-file-input form-control @error('logo') is-invalid @enderror" id="logo"/>
                                        <label class="custom-file-label">Choose File</label>
                                    </div>
                                    <div class="form-text text-muted">The logo must have a maximum size of 1MB</div>
                                    @error('logo') {{ $message }} @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-whitesmoke text-md-right">
                            <button class="btn btn-primary mr-2" type="submit" id="save-btn">Update Brand</button>
                            <a class="btn btn-outline-secondary" href="{{ route('admin.brands.index') }}"><i class="fas fa-trash mr-2"></i>Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection