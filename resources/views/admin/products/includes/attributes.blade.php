<div class="card" id="settings-card">
    <div class="card-header">
        <h4>Attributes</h4>
    </div>
    <div class="card-body">
        <div class="form-group row align-items-center">
            <label for="attribute" class="form-control-label col-sm-3 text-md-right">Select an Attribute</label>
            <div class="col-sm-6 col-md-9">
                <select name="attribute" id="attribute" class="form-control">
                </select>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h4>Product Attributes</h4>
    </div>
    <div class="card-body">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Value</th>
                <th scope="col">Qty</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody id="bodyData">
        </tbody>
    </table>
    </div>
</div>

@push('scripts')
<script>
    loadAttributelist();
    getAttributes();

    // On change dropdown value
    $("#attribute").change(function () {
        var selectedAttribute = this.value;
        console.log(selectedAttribute);
    });

    // Get All Attributes for the product
    function getAttributes(){ 
        $(document).ready(function() {
            $.ajax({
                url: "/admin/products/attributes",
                type: "POST",
                data:{
                    _token:'{{ csrf_token() }}',
                    id: '{{ $product->id }}'
                },
                cache: false,
                dataType: 'json',
                success: function(dataResult){
                    console.log(dataResult);
                }
            });
        });
    }

    // Load Attributes List
    function loadAttributelist(){ 
        $(document).ready(function() {
            $.ajax({
                url: "/admin/products/attributes/load",
                type: "GET",
                data:{
                    _token:'{{ csrf_token() }}'
                },
                cache: false,
                dataType: 'json',
                success: function(dataResult){
                    console.log(dataResult);
                    if(dataResult.status){
                        $("#attribute").empty();
                        $("#attribute").append('<option value="-1" selected>Select Attribute</option>');
                        $.each(dataResult.data, function(key,value){
                            console.log(key);
                            console.log(value);
                            $("#attribute").append('<option value="' + key + '">' + value.name + '</option>');
                        });
                    }
                }
            });
        });
    }
</script>
@endpush