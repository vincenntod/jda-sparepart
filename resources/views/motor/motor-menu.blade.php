@extends('template.admin-template')
@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href='/motor/create' class="btn btn-primary btn-sm">+ Add New Data</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name Motor</th>
                        <th scope="col">Year Production</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Sparepart List</th>
                        <th scope="col">Category Motor</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="body">
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    let url = '/motor/'
    let table;
    $(document).ready(function(){
        table = $('#myTable').DataTable({
            "processing": true,
            "serverSide": false,
            "responsive": true,
            "ajax": {
                "url": url,
                "data": function(){},
                "error": function(error){
                    console.log(error);
                },
            },
            "columns": [
                {
                "data": null,
                "render": function (data, type, row, meta) {
                    return meta.row + 1;
                    },
                "orderable": true,
                },
                {
                    "data": "name_motor",
                    "orderable": true,
                },
                {
                    "data": "year_production",
                    "orderable": true,
                },
                {
                    "data": "name_brand",
                    "orderable": true,
                },
                {
                    "data": "id_sparepart",
                    "orderable": true,
                },
                {
                    "data": "name_category_motor",
                    "orderable": true,
                },
                {
                    "data": null,
                    "render": function (data, type, row, meta) {
                        return `<a href='`+url+data.id+`/edit' class="btn btn-primary btn-sm">Edit</a>
                                <button type="submit" class="btn btn-danger btn-sm btn-delete" data-id=`+data.id+`>Delete</button>`
                    },
                    "orderable": true,
                },
            ],
            "pageLength" : 10,
            "lengthMenu" : [5,10,20,50],
        })
    });

    $(document).on('click', '.btn-delete', function() {
        id = $(this).attr('data-id')
        Swal.fire({
            text: 'Apakah anda yakin akan menghapus data tersebut ?',
            icon: 'warning',
            confirmButtonText: 'OK',
            showCancelButton: true,
        }).then((result) => {
            if (result.isConfirmed) {
                data = {
                    "_method": "DELETE",
                    "_token": "{{ csrf_token() }}",
                },
                AjaxDelete(url, id, data);
            }
        });
    });
</script>

@endpush
