@extends('template.admin-template')

@section('content')
<div class="container">
    <h2>Edit Data</h2>
        <input type="text" class="form-control" id="id" name="id" value="{{ $post[0]->id }}" hidden>
        <div class="mb-3">
            <label for="name_sparepart" class="form-label">Name Sparepart</label>
            <input type="text" class="form-control" id="name_sparepart" name="name_sparepart" value="{{ $post[0]->name_sparepart }}" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ $post[0]->price }}" required>
        </div>
        <div class="mb-3">
            <label for="id_supplier" class="form-label">Supplier</label>
            <select id="id_supplier" class="form-control" name="id_supplier" required>
                <option value="{{$post[0]->id_supplier}}" selected>{{$post[0]->name_supplier}}</option>
                @foreach($supplier as $suppliers)
                <option value={{$suppliers->id}}>{{$suppliers->name_supplier}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
        <a href="/sparepart-menu">
            <i class="fas fa-fw fa-arrow-left"></i>
            <span>Back</span>
        </a>
</div>
@endsection

@push('script')
<script>
    let url = '/sparepart/'
    let id = $('#id').val()
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
                    data= {
                        "_method": "PUT",
                        "_token": "{{ csrf_token() }}",
                        "name_sparepart" : $('#name_sparepart').val(),
                        "name_sparepart" : $('#name_sparepart').val(),
                        "price" : $('#price').val(),
                        "id_supplier" : $('#id_supplier').val(),
                    }
                    AjaxEdit(url, id, data, "/sparepart-menu")
                } else {
                    id_sparepart.length = 0;
                }
            });
        });
    })
</script>

@endpush
