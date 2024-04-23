  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">New Category</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <!-- Modal body --> 
        <div class="modal-body">
            <form data="{{ route('saveCategory') }}" id="insertFormData"  method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="catId" id="catId" value="" />
            <div id="errors" class="text-danger"></div>
         <div class="row">
            
    

            <div class="col-md-8">
              <div class="form-group">
                  <label>Enter Exam Name : <span class="text-danger">*</span></label>
                  <input type="text" class="form-control"  name="catName" id="catName" placeholder="Enter Category Name" />
              </div>
            </div>

            <div class="col-md-4 mt-1">
                <div class="form-group mt-3">
                    <button type="submit" id="submit" class="btn btn-success">Submit</button>
                </div>
            </div>

     

         </div>
        
       
            </form>
        </div>
      </div>
    </div>
  </div>

