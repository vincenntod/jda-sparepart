@extends('template.admin-template')

@section('content')
<div class="container">
    <h2>Tambah Data</h2>
        <div class="mb-3">
            <label for="category" class="form-label">Name Category</label>
            <input type="text" class="form-control" id="category" name="category" required>
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
    let id_sparepart = []
    $(document).ready(function(){
        $('#submit').on('click', function() {
            var checkbox = document.querySelectorAll('input[type="checkbox"]');
            checkbox.forEach(function(checkbox) {
                if (checkbox.checked) {
                   id_sparepart.push(checkbox.value)
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
                        "_method": "POST",
                        "_token": "{{ csrf_token() }}",
                        "category" : $('#category').val(),
                    }
                    AjaxCreate(url,data,"/category-menu")
                }
            });
        });
    })
</script>

@endpush
