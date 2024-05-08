@extends('template.admin-template')

@section('content')
<div class="container">
    <h2>Edit Data</h2>
        <input type="text" class="form-control" id="id" name="id" value="{{ $post->id }}" hidden>
        <div class="mb-3">
            <label for="name_brand" class="form-label">Name brand</label>
            <input type="text" class="form-control" id="name_brand" name="name_brand" value="{{ $post->name_brand }}" required>
        </div>
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
        <a href="/brand-menu">
            <i class="fas fa-fw fa-arrow-left"></i>
            <span>Back</span>
        </a>
</div>
@endsection

@push('script')
<script>
    let url = '/brand/'
    let id = $('#id').val()
    let id_brand = []
    $(document).ready(function(){
        $('#submit').on('click', function() {
            var checkbox = document.querySelectorAll('input[type="checkbox"]');
            checkbox.forEach(function(checkbox) {
                if (checkbox.checked) {
                   id_brand.push(checkbox.value)
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
                        "name_brand" : $('#name_brand').val()
                    },
                    AjaxEdit(url,id,data,"/brand-menu")
                } else {
                    id_brand.length = 0;
                }
            });
        });
    })
</script>

@endpush
