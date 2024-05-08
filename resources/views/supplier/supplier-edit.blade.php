@extends('template.admin-template')

@section('content')
<div class="container">
    <h2>Edit Data</h2>
        <input type="text" class="form-control" id="id" name="id" value="{{ $post->id }}" hidden>
        <div class="mb-3">
            <label for="name_supplier" class="form-label">Name Supplier</label>
            <input type="text" class="form-control" id="name_supplier" name="name_supplier" value="{{ $post->name_supplier }}" required>
        </div>
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
        <a href="/supplier-menu">
            <i class="fas fa-fw fa-arrow-left"></i>
            <span>Back</span>
        </a>
</div>
@endsection

@push('script')
<script>
    let url = '/supplier/'
    let id = $('#id').val()
    let id_supplier = []
    $(document).ready(function(){
        $('#submit').on('click', function() {
            var checkbox = document.querySelectorAll('input[type="checkbox"]');
            checkbox.forEach(function(checkbox) {
                if (checkbox.checked) {
                   id_supplier.push(checkbox.value)
                }
            });
            Swal.fire({
                text: 'Apakah anda yakin?',
                icon: 'warning',
                confirmButtonText: 'OK',
                showCancelButton: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    data = {
                        "_method": "PUT",
                        "_token": "{{ csrf_token() }}",
                        "name_supplier" : $('#name_supplier').val()
                    }
                    AjaxEdit(url,id,data,"/supplier-menu")
                } else {
                    id_supplier.length = 0;
                }
            });
        });
    })
</script>

@endpush
