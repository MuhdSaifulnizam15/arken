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
                    <form action="{{ route('admin.categories.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name <span class="m-l-5 text-danger"> *</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}">
                                @error('name') {{ $message }} @enderror
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" rows="4" name="description" id="description">{{ old('description') }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="parent">Parent Category <span class="m-l-5 text-danger"> *</span></label>
                                <select id=parent class="form-control custom-select mt-15 @error('parent_id') is-invalid @enderror" name="parent_id">
                                    <option value="0">Select a parent category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"> {{ $category->name }} </option>
                                    @endforeach
                                </select>
                                @error('parent_id') {{ $message }} @enderror
                            </div>

                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="featured" name="featured">
                                    <label class="form-check-label" for="featured">
                                    Featured Category
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="menu" name="menu">
                                    <label class="form-check-label" for="menu">
                                    Show in Menu
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Category Image</label>
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input form-control @error('image') is-invalid @enderror" id="image"/>
                                    <label class="custom-file-label">Choose File</label>
                                </div>
                                <div class="form-text text-muted">The image must have a maximum size of 1MB</div>
                                @error('image') {{ $message }} @enderror
                            </div>
                        </div>
                        <div class="card-footer bg-whitesmoke text-md-right">
                            <button class="btn btn-primary mr-2" type="submit" id="save-btn">Save Category</button>
                            <a class="btn btn-outline-secondary" href="{{ route('admin.categories.index') }}"><i class="fas fa-trash mr-2"></i>Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection