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
          <div class="card-header justify-content-between">
            <h4>{{ $subTitle }}</h4>
            <a href="{{ route('admin.brands.create') }}" class="btn btn-outline-primary">Add Brand</a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-md data-table">
                <thead>
                  <tr class="d=flex">
                    <th style="width:10px, min-width:10px;"></th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th style="width:120px; min-width:120px;" class="text-danger text-center"><i class="fa fa-bolt"></i></th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@section('additional_js')
<script type="text/javascript">
    $(function() {
        var table = $('.data-table').DataTable({
            processing: true,
            dataSrc: "",
            ajax: "{{ route('admin.brands.index') }}",
            pageLength: 10,
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex'},
                { data: 'name', name: 'name'},
                { data: 'slug', name: 'slug'},
                { data: 'action', name: 'action', orderable: false, searchable: false},
            ],
        });
     });
</script>
@endsection