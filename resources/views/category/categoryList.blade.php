@extends('commonFile.baseFile')
@section('content')

<section>
    <div class="row">
        <div class="col-md-12">
            <div class="text-end">
                <button type="button" class="btn btn-primary" onClick="openNewProductCat()" >
                    <i class="fa fa-plus" aria-hidden="true"></i>New Category.
                </button>
            </div>

            <div class="table-responsive mt-3">
                <table class="table table-striped table-hover dt-responsive" cellspacing="0" width="100%" id="server_datatable" >
                    <thead>
                        <tr>
 
                            <th>#Id</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@include('category.newProductCat')

<script>
    $(function() {
        load_data(); // first load
    });
    function load_data(){
        var ajax_url = '{{route("categoriesList")}}';
        var t= $('#server_datatable').DataTable( {
            "order": [[ 0, "desc" ]],
            dom: 'Bfrtip',
            lengthMenu: [
            [10, 50, 100, 500, -1],
            [10, 50, 100, 500, "All"]
            ],
            buttons: [
            'pageLength', 'copy', 'pdf', 'print','excel'
            ],
            processing: true,
            serverSide: true,
            destroy: true,
            // stateSave: true,
            "ajax" : {
                "url" : ajax_url,
                "dataType": "json",
                "type": "post",
                "data" : {
                '_token': '{{ csrf_token() }}'
                },
                // "dataSrc": "records"
            },
                "columns":[
                // { data: 'DT_RowIndex' },
                    {
                    "data": 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                { data: 'name', name: 'name'},
                { data : 'status', name: 'status'},
                { data: 'action', name: 'action'},
                
                ],
        });
    }
</script>
@endsection