@extends('template.admin-template')

@section('content')
<div class="container">
    <h2>Edit Data</h2>
        <input type="text" class="form-control" id="id" name="id" value="{{ $post->id }}" hidden>
        <div class="mb-3">
            <label for="name_category" class="form-label">Name Category</label>
            <input type="text" class="form-control" id="name_category_motor" name="name_category_motor" value="{{ $post->name_category_motor }}" required>
        </div>
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
        <a href="/category-menu">
            <i class="fas fa-fw fa-arrow-left"></i>
            <span>Back</span>
        </a>
</div>
@endsection

@push('script')
<script>
    let url = '/category/'
    let id = $('#id').val()
    let id_category = []
    $(document).ready(function(){
        $('#submit').on('click', function() {
            var checkbox = document.querySelectorAll('input[type="checkbox"]');
            checkbox.forEach(function(checkbox) {
                if (checkbox.checked) {
                   id_category.push(checkbox.value)
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
                        "name_category_motor" : $('#name_category_motor').val()
                    }
                    AjaxEdit(url, id, data, "/category-menu")
                } else {
                    id_category.length = 0;
                }
            });
        });
    })
</script>

@endpush
