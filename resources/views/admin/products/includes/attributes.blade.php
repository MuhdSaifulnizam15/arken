<div class="card" id="settings-card">
    <div class="card-header">
        <h4>Attributes</h4>
    </div>
    <div class="card-body">
        <input type="hidden" name="attributeId">
        <div class="form-group row align-items-center">
            <label for="attribute" class="form-control-label col-sm-3 text-md-right">Select an Attribute</label>
            <div class="col-sm-6 col-md-9">
                <select name="attribute" id="attribute" class="form-control text-capitalize">
                </select>
            </div>
        </div>
    </div>
</div>

<div class="card addProductAttribute" id="settings-card" hidden>
    <div class="card-header">
        <h4>Add Attributes To Product</h4>
    </div>
    <div class="card-body">
        <input type="hidden" name="attributeValueId">
        <div class="form-group row align-items-center">
            <label for="values" class="form-control-label col-sm-3 text-md-right">Select a value</label>
            <div class="col-sm-6 col-md-9">
                <select name="values" id="values" class="form-control text-capitalize">
                </select>
            </div>
        </div>
        <div class="form-group row align-items-center quantityAttribute" hidden>
            <label for="quantityAttribute" class="form-control-label col-sm-3 text-md-right">Quantity</label>
            <div class="col-sm-6 col-md-9">
                <input 
                    type="number"
                    class="form-control" 
                    name="quantityAttribute" 
                    id="quantityAttribute" 
                    placeholder="Enter product quantity"
                />
            </div>
        </div>
        <div class="form-group row priceAttribute" hidden>
            <label for="priceAttribute" class="form-control-label col-sm-3 text-md-right">Price</label>
            <div class="col-sm-6 col-md-9">
                <input 
                    type="number"
                    class="form-control" 
                    name="priceAttribute" 
                    id="priceAttribute" 
                    placeholder="Enter product price"
                />
                <small class="text-danger">This price will be added to the main price of product on frontend.</small>
            </div>
        </div>
    </div>
    <div class="card-footer bg-whitesmoke text-md-right">
        <button class="btn btn-primary" id="add-btn">Add</button>
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
        <tbody id="productAttributeData">
        </tbody>
    </table>
    </div>
</div>

@push('scripts')
<script>
    loadAttributelist();
    getAttributes();

    // On change dropdown value of attribute
    $("#attribute").change(function () {
        var selectedAttribute = this.value;
        console.log(selectedAttribute);
        if(selectedAttribute != -1){
            selectAttribute(selectedAttribute);
            $('.addProductAttribute').attr('hidden', false);
            $('div.quantityAttribute').attr('hidden', true);
            $('div.priceAttribute').attr('hidden', true);
            $('input[name=quantityAttribute]').val('');
            $('input[name=priceAttribute]').val('');
            $('input[name=attributeId]').val(selectedAttribute).attr('type', 'hidden');
        } else {
            $('input[name=quantityAttribute]').val('');
            $('input[name=priceAttribute]').val('');
            $('.addProductAttribute').attr('hidden', true);
        }
    });

    // On change dropdown value of values
    $("#values").change(function () {
        var selectedAttribute = this.value;
        var dataPrice = $(this).find(':selected').data('price');
        console.log('dataPrice', dataPrice);
        if(selectedAttribute != -1){
            // Show quantity and price div
            $('div.quantityAttribute').attr('hidden', false);
            $('div.priceAttribute').attr('hidden', false);

            // Assign price default value from option data-price
            if(dataPrice != null){
                $('input[name=priceAttribute]').val(dataPrice);
            } else {
                $('input[name=priceAttribute]').val('');
            }
            $('input[name=quantityAttribute]').val('');
            $('input[name=attributeValueId]').val(selectedAttribute).attr('type', 'hidden');
        } else {
            $('input[name=priceAttribute]').val('');
            $('input[name=quantityAttribute]').val('');    
            $('div.quantityAttribute').attr('hidden', true);
            $('div.priceAttribute').attr('hidden', true);
        }
    });

    // on click add button
    $(document).on("click", "#add-btn", function() {
        if($("#values").val() == -1){
            swal({  
                icon: 'warning',
                title: 'Please select a value attribute to be added on this product',
                timer: 3000,
            });
        } else {
            var quantity = $('input[name=quantityAttribute]').val();
            var price = $('input[name=priceAttribute]').val();
            var attributeId = $('input[name=attributeId]').val();
            var attributeValueId = $('input[name=attributeValueId]').val();
            console.log(attributeId + ' ' + attributeValueId + ' ' + quantity + ' ' + price);
            if(quantity != '' && price != ''){
                addProductAttribute(attributeId, attributeValueId, quantity, price);
            } else {
                swal({  
                    icon: 'warning',
                    title: 'Quantity and Price field are compulsory. Please try again',
                    timer: 3000,
                });
            }
        }
    });

    // On Click Delete Button
    $(document).on("click", ".deleteProductAttribute", function() {
        var id = $(this).attr("id");
        console.log(id);
        swal({
            title: 'Are you sure you want to delete this?',
            text: 'This action cant be undo',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if(willDelete) {
                deleteProductAttribute(id);
            }
        });
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
                    $("#productAttributeData").empty();
                    var bodyData = '';
                    var i=1;
                    $.each(dataResult,function(index,row){
                        bodyData += "<tr>" +
                                    "<td>" + i++ + "</td>" +
                                    "<td>" + row.value + "</td>" +
                                    "<td>" + row.quantity + "</td>" +
                                    "<td>" + row.price + "</td>" +
                                    "<td>"; 
                        bodyData += "<a class='btn btn-outline-danger deleteProductAttribute m-1' id=" + row.id +"><i class='fa fa-trash'></i></a></td>" +
                                    "</tr>";
                        
                    })
                    $("#productAttributeData").append(bodyData);
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
                    // console.log(dataResult);
                    if(dataResult.status){
                        $("#attribute").empty();
                        $("#attribute").append('<option value="-1" selected>Select Attribute</option>');
                        $.each(dataResult.data, function(key,value){
                            // console.log(key);
                            // console.log(value);
                            $("#attribute").append('<option class="text-capitalize" value="' + value.id + '">' + value.name + '</option>');
                        });
                    }
                }
            });
        });
    }

    // Get Attributes Value based on selected attributes
    function selectAttribute(attributeId){ 
        $(document).ready(function() {
            $.ajax({
                url: "/admin/products/attributes/values",
                type: "GET",
                data:{
                    _token:'{{ csrf_token() }}',
                    id: attributeId,
                },
                cache: false,
                dataType: 'json',
                success: function(dataResult){
                    console.log(dataResult);
                    if(dataResult.status){
                        $("#values").empty();
                        $("#values").append('<option value="-1" selected>Select a value</option>');
                        $.each(dataResult.data, function(key,value){
                            // console.log(key);
                            // console.log(value);
                            $("#values").append('<option class="text-capitalize" value="' + value.value + '" data-price="' + value.price + '">' + value.value + '</option>');
                        });
                    }
                }
            });
        });
    }

    // Add Attributes value of the product
    function addProductAttribute(attributeId, value, quantity, price){ 
        $(document).ready(function() {
            $.ajax({
                url: "/admin/products/attributes/add",
                type: "POST",
                data:{
                    _token:'{{ csrf_token() }}',
                    attribute_id: attributeId,
                    value: value,
                    quantity: quantity,
                    price: price,
                    product_id: '{{ $product->id }}'
                },
                cache: false,
                dataType: 'json',
                success: function(dataResult){
                    console.log(dataResult);
                    $('input[name=quantityAttribute]').val('');
                    $('input[name=priceAttribute]').val('');
                    $('.addProductAttribute').attr('hidden', true);
                    $("#values").val(-1);
                    $("#attribute").val(-1);
                    swal({  
                        icon: dataResult.status,
                        title: dataResult.message,
                        timer: 3000,
                    });
                    getAttributes();
                }
            });
        });
    }

    // Delete Product Attribute
    function deleteProductAttribute(productAttributeId){ 
        $(document).ready(function() {
            $.ajax({
                url: "/admin/products/attributes/delete-attribute-value",
                type: "POST",
                data:{
                    _token:'{{ csrf_token() }}',
                    id: productAttributeId
                },
                cache: false,
                dataType: 'json',
                success: function(dataResult){
                    console.log(dataResult);
                    swal({  
                        icon: dataResult.status,
                        title: dataResult.message,
                        timer: 3000,
                    });
                    getAttributes();
                }
            });
        });
    }
</script>
@endpush