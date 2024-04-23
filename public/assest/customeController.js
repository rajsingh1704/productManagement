

function openNewProductCat(){
    $("#insertFormData").trigger("reset");
    $("#catId").val('');
    $("#myModal").modal('show');
}

function editProductCat(data = ''){
    $("#catId").val(data.id);
    $("#catName").val(data.name);
    $("#myModal").modal('show');
}