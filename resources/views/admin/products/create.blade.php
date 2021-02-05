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

@section('additional_js')
<script type="text/javascript">
    $('#categories').select2();
    Dropzone.options.dropzone =
        {
            maxFilesize: 10,
            renameFile: function (file) {
                var dt = new Date();
                var time = dt.getTime();
                return time + file.name;
            },
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            timeout: 60000,
            success: function (file, response) {
                console.log(response);
                swal({  
                    icon: response.status,
                    title: response.message,
                    timer: 3000,
                })
                .then((value) => {
                    switch (value) {
                        default:
                        window.location.reload();
                    }
                });
            },
            error: function (file, response) {
                return false;
            }
        };

    
        // Delete Image
    function deleteImage(id){    
        $(document).ready(function() {
            $.ajax({
                url: "/admin/products/delete-image",
                type: "POST",
                data:{
                    _token:'{{ csrf_token() }}',
                    id: id
                },
                cache: false,
                dataType: 'json',
                success: function(dataResult){
                    console.log(dataResult);
                    swal({  
                        icon: dataResult.status,
                        title: dataResult.message,
                        timer: 3000,
                        buttons: {
                            ok: "Ok",
                        },
                    })
                    .then((value) => {
                        switch (value) {
                            default:
                            window.location.reload();
                        }
                    });
                }
            });
        });
    }

    // On Click Delete Image Button
    $(document).on("click", ".delete-image", function() {
        var id = $(this).attr("id");
        swal({  
            icon: "warning",
            title: "Are you sure you want to delete this image. Images would no longer recoverable later.",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                console.log(id);
                deleteImage(id);
            }
        });
    });
</script>
@endsection