<div class="card" id="settings-card">
    <div class="card-header">
        <h4>Attribute Values</h4>
    </div>
    <div class="card-body">
        <div class="form-group row align-items-center">
            <label for="value" class="form-control-label col-sm-3 text-md-right">Value</label>
            <div class="col-sm-6 col-md-9">
                <input 
                    type="text" 
                    name="value" 
                    class="form-control" 
                    id="value" 
                    placeholder="Enter attribute value" 
                    value="{{ $edit ? old('value', $attribute->value) : old('value') }}"
                />
            </div>
        </div>
        <div class="form-group row align-items-center">
            <label for="price" class="form-control-label col-sm-3 text-md-right">Price</label>
            <div class="col-sm-6 col-md-9">
                <input 
                    type="number"
                    class="form-control" 
                    name="price" 
                    id="price" 
                    placeholder="Enter attribute value price" 
                    value="{{ $edit ? old('price', $attribute->price) : old('price') }}"
                />
            </div>
        </div>
    </div>
    <div class="card-footer bg-whitesmoke text-md-right">
        <button class="btn btn-primary" id="save-btn">Save Changes</button>
        <button class="btn btn-primary" id="update-btn" hidden>Update Changes</button>
        <a class="btn btn-outline-secondary" href="{{ route('admin.attributes.index') }}"><i class="fas fa-trash mr-2"></i>Cancel</a>
        <button class="btn btn-outline-secondary" id="reset-btn" hidden>Reset</button>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h4>Option Values</h4>
    </div>
    <div class="card-body">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Value</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody id="bodyData">
        </tbody>
    </table>
    </div>
</div>

@section('additional_js')
<script>
    fetchRecords();

    // Fetch records
    function fetchRecords(){    
        $(document).ready(function() {
            $.ajax({
                url: "/admin/attributes/get-values",
                type: "POST",
                data:{
                    _token:'{{ csrf_token() }}',
                    id: '{{ $attribute->id }}'
                },
                cache: false,
                dataType: 'json',
                success: function(dataResult){
                    console.log(dataResult);
                    // var resultData = dataResult.data;
                    $("#bodyData").empty();
                    var bodyData = '';
                    var i=1;
                    $.each(dataResult,function(index,row){
                        // var editUrl = url+'/'+row.id+"/edit";
                        bodyData += "<tr>" +
                                    "<td>"+ i++ +"</td>" +
                                    "<td>" + row.value + "</td>" +
                                    "<td>";
                        if(row.price != null){
                            bodyData += row.price;
                        }     
                        bodyData += "</td>" +
                                    "<td> <a class='btn btn-outline-primary edit m-1' data-id=" + row.id + "><i class='fa fa-edit'></i></a>" + 
                                    "<a class='btn btn-outline-danger delete m-1' id=" + row.id +"><i class='fa fa-trash'></i></a></td>" +
                                    "</tr>";
                        
                    })
                    $("#bodyData").append(bodyData);
                }
            });
        });
    }

    // Delete records
    function deleteRecords(id){    
        $(document).ready(function() {
            $.ajax({
                url: "/admin/attributes/delete-values",
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
                    });
                    fetchRecords();
                }
            });
        });
    }

    // Add record
    $(document).on("click", "#save-btn", function() {
        var value = $('input[name=value]').val();
        var price = $('input[name=price]').val();
        console.log('value, price', value + " " + price + " " + {{ $attribute->id }});
        if(value != '' && price != ''){
            $.ajax({
                url: "/admin/attributes/add-values",
                type: "POST",
                data:{
                    _token:'{{ csrf_token() }}',
                    id: '{{ $attribute->id }}',
                    value: value,
                    price: price,
                },
                dataType: 'json',
                success: function(dataResult){
                    console.log('dataResult', dataResult);
                    fetchRecords();
                }
            });
        }
    });

    // On Click Edit Button
    $(document).on("click", ".edit", function() {
        // Show Reset and Update button
        $('#reset-btn').removeAttr('hidden');
        $('#update-btn').removeAttr('hidden');

        $('input[name=price]').val();

        // Hide Save button
        $('#save-btn').attr('hidden', true);
    });

    // On Click Update Button
    $(document).on("click", "#update-btn", function() {
        // Hide Update and Reset Btn
        $('#reset-btn').attr('hidden', true);
        $('#update-btn').attr('hidden', true);
    });

    // On Click Delete Button
    $(document).on("click", ".delete", function() {
        var id = $(this).attr("id");
        swal({
            title: 'Are you sure you want to delete this?',
            text: 'This action cant be undo',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if(willDelete) {
                deleteRecords(id);
            }
        });
    });
</script>
@endsection