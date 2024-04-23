@extends('commonFile.baseFile')
@section('content')



<link rel="stylesheet" href="assest/imageUploader/fileUploader.css">

<style>
    .parent-div {
  width: 60%;

  >h1 {
    color: #2b2b2b;
    padding-bottom: 20px;
  }
}
</style>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add New Product</h4>
                    </div>
                    <div class="card-body">
                        <form enctype="multipart/form-data">
                            @csrf
            
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <div class="from-group">
                                        <label>Select Category : <span class="text-danger">*</span></label>
                                        <!-- Add select category dropdown here -->
                                    </div>
                                </div>
            
                                <div class="col-md-8">
                                    <div class="from-group">
                                        <label>Enter Product Title : <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="title" id="title" placeholder="Enter Product Title" required />
                                    </div>
                                </div>
                            </div>
            
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Enter Product MRP : <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="mrp" id="mrp" placeholder="Enter Product MRP" required onkeyup="CalculatePrice()" />
                                    </div>
                                </div>
            
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Enter Product Discount : <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="discount" id="discount" placeholder="Enter Product Discount" value="0" required onkeyup="CalculatePrice()" />
                                    </div>
                                </div>
            
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Enter Product Price : <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="price" id="price" placeholder="Enter Product Price" value="0" readonly />
                                    </div>
                                </div>
            
                            </div>
            
                            <div class="row">
                                <div class="form-group">
                                    <label for="images">Product Images</label>
                                    <div id="fileUpload"></div>
                                </div>
                            </div>
            
                            <div id="image-preview"></div>
                            <div id="image-error" class="text-danger"></div>
            
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Product Description : <span class="text-danger">*</span></label>
                                        <textarea name="editor" class="form-control" id="editor" rows="6" name="description"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <button class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>

<script>
  $(document).ready(function () {
            $("#fileUpload").fileUpload();
        });


    function CalculatePrice() {
        var mrp = $("#mrp").val() == '' ? 0 : $("#mrp").val();
        var discount = $("#discount").val() == '' ? 0 : $("#discount").val();
        var price = parseFloat(mrp) - parseFloat(discount);
        $("#price").val(price);
    }
</script>


<script src="{{ url('assest/imageUploader/fileUploader.js')}}"></script>

@endsection
