@extends('admin.layouts.app')

@section('title', 'List Categories')

@section('content')
<section class="section">
  <div class="section-header">
    <h1>List Categories</h1>
  </div>

  @include('admin.partials.flash')
  
  <div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>List of Categories</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-md data-table">
                <thead>
                  <tr class="d=flex">
                    <th style="width:10px, min-width:10px;"></th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Parent</th>
                    <th>Featured</th>
                    <th>Menu</th>
                    <!-- <th>Order</th> -->
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
            ajax: "{{ route('admin.categories.index') }}",
            pageLength: 10,
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex'},
                { data: 'name', name: 'name'},
                { data: 'slug', name: 'slug'},
                { 
                  data: 'parent_name', 
                  name: 'parent_name'
                },
                { 
                  data: 'featured', 
                  className: 'text-center',
                  render: function(data) {
                    if(data == 1) {
                      return '<span class="badge badge-success">Yes</span>'
                    } else {
                      return '<span class="badge badge-danger">No</span>'
                    }
                  }
                },
                { 
                  data: 'menu', 
                  className: 'text-center',
                  render: function(data) {
                    if(data == 1) {
                      return '<span class="badge badge-success">Yes</span>'
                    } else {
                      return '<span class="badge badge-danger">No</span>'
                    }
                  }
                },
                // { 
                //   data: 'order',
                //   name: 'order',
                // },
                { data: 'action', name: 'action', orderable: false, searchable: false},
            ],
        });
     });
</script>
@endsection