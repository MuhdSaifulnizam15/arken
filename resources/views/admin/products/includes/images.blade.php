<div class="card" id="settings-card">
    <div class="card-header">
        <h4>Upload Image</h4>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.products.dropzone.store') }}" class="dropzone" id="dropzone" enctype="multipart/form-data">
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            {{ csrf_field() }}
        </form>
    </div>
    <!-- <div class="card-footer bg-whitesmoke text-md-right">
        <button class="btn btn-primary" type="button" id="uploadButton">Upload Images</button>
        <a class="btn btn-outline-secondary" href="{{ route('admin.products.index') }}"><i class="fas fa-trash mr-2"></i>Cancel</a>
    </div> -->
    @if ($product->images)
        <hr>
        <div class="row">
            @foreach($product->images as $image)
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ asset('storage/'.$image->full) }}" id="brandLogo" class="img-fluid" alt="img">
                            <a class="card-link float-right text-danger delete-image" id="{{ $image->id }}">
                                <i class="fa fa-fw fa-lg fa-trash"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

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