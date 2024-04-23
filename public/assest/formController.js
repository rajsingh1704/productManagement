$("form#insertFormData").submit(function (e) {
    e.preventDefault();
    var formData = new FormData(this);
    $(".error").hide();
    var url = $("#insertFormData").attr("data");
    //   alert(url);
    Swal.fire({
        position: 'center',
        text: 'Now loading....',
        showConfirmButton: false,
        allowEscapeKey: false,
        allowOutsideClick: false,
    })
    $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        beforeSend: function () {
            $('#submit').attr('disabled', true);
        },
        success: function (data) {
            $('#submit').attr('disabled', false);
            // alert(JSON.stringify(data));
            // console.log(data);
            var result = data;
            if (result.statuscode == '200') {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Added!',
                    text: result.message,
                    showConfirmButton: false,
                    timer: 2000
                });
               
            } else if (result.statuscode == '201') {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Added!',
                    text: result.message,
                    showConfirmButton: false,
                    timer: 2000
                }).then(function(){ 

                    location.reload();
                    }
                 );
               
            }else if (result.statuscode == '202') { // for modules submission
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Added!',
                    text: result.message,
                    showConfirmButton: false,
                    timer: 1200
                }).then(function(){
                   if(result.actionType == '001'){ // Location Reload
                    location.reload();
                   } else if(result.actionType == '002'){ // function Call

                    $.each(result.callback, function(key2, call) {
                        // alert(call);
                        window[call]();
                       
                    });

                   } else if(result.actionType == '003'){ 
                         // Function Call And Close Modal
                         $.each(result.callback, function (key2, call) {
                            window[call]();
                        });

                        $("#" + result.closedPopup).modal("hide");
                   }
                    
                })
                
            }else if (result.statuscode == '500') { // Internal Server Error! Cached Exceptions
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Opps!',
                    text: result.message,
                    showConfirmButton: false,
                    timer: 3000
                })
                console.log(result.errors)
            } else {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Opps..',
                    text: result.message,
                    showConfirmButton: false,
                    timer: 3000
                })
            }
        },
        error: function (xhr, status, error) {
            $('#submit').attr('disabled', false);
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Opps..',
                text: error,
                showConfirmButton: false,
                timer: 3000
            })
        },

        cache: false,
        contentType: false,
        processData: false
    });
});