@extends('template.admin-template')

@section('content')
<div class="container">
    <h2>Tambah Data</h2>
        <div class="mb-3">
            <label for="supplier" class="form-label">Name Supplier</label>
            <input type="text" class="form-control" id="supplier" name="supplier" required>
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
                        "supplier" : $('#supplier').val(),
                    }
                    AjaxCreate(url, data, "/supplier-menu")
                }
            });
        });
    })
</script>

@endpush
