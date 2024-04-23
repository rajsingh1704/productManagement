$(document).on("click", ".delete2024", function () {
    $(element).closest("tr").fadeOut();
    var id = $(this).attr('id');
    var url = $(this).attr('url');
    var token = $('meta[name="csrf-token"]').attr('content');
    var element = this;

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {

            $.ajax({
                type: "POST",
                url: url,
                headers: {
                    'X-CSRF-TOKEN': token
                },
                data: {
                    id: id,
                    '_token': token
                },
                success: function (data) {
                    var result = data;
                    // alert(JSON.stringify(result));
                    if (result.statuscode == '001') {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Done!',
                            text: result.message,
                            showConfirmButton: false,
                            timer: 2000
                        })
                        $(element).closest("tr").fadeOut();
                    }
                 
                    else if(result.statuscode == '000') {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Not Deleted!',
                            text: result.errors,
                            showConfirmButton: false,
                            timer: 100
                        })
                    }
                }
            });
        }
    })
});

$(document).ready(function(){
    $(document).on("click",".toggleStatus",function(){
        var data = $(this).attr('data');
        // alert(data);
        var element = this;
        var id = $(this).attr('id');
        var status_data = $(this).attr('status_data');
        var token = $('meta[name="csrf-token"]').attr('content');

          if(status_data == '1'){
               var status = '0';
               var visStatus = '<a href="javascript:void(0);" class="toggleStatus alert text-danger" data="' + data + '" id="'+ id +'"  status_data="'+ status +'" >Inactive</a>';
          }else{
              var status = '1';
              var visStatus = ' <a href="javascript:void(0);" class="toggleStatus alert text-success" data="' + data +'" id="'+ id +'"  status_data="'+ status +'" >Active</a>';
            }

            Swal.fire({
                  title: 'Are you sure?',
                  text: "Don't worry this action is reversible!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, update it!'
                }).then((result) => {
                if (result.value) {
             $.ajax({
                    type: "POST",
                    url: data,
                    headers: {
                    'X-CSRF-TOKEN': token
                    },
                    data: {
                        id        : id,
                        status     : status,
                    },
                    success: function(data) {
                        var result = data;
                        if(result.statuscode == '001'){
                          Swal.fire({
                              position: 'center',
                              icon: 'success',
                              title: 'Done!',
                              text: result.message,
                              showConfirmButton: false,
                              timer: 2000
                              })
                              $(element).closest("td").html(visStatus);
                        //    history.go(0);
                          }else{
                              Swal.fire({
                              position: 'center',
                              icon: 'warning',
                              title: 'Not Updated!',
                              text: result.message,
                              showConfirmButton: false,
                              timer: 1000
                              })
                          }
                    }
                });
            }
        })
    });
});