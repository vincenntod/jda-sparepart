@extends('template.admin-template')

@section('content')
<div class="container">
    <h2>Edit Data Motor</h2>
        <input type="text" class="form-control" id="id" name="id" value="{{ $post[0]->id }}" hidden>
        <div class="mb-3">
            <label for="name_motor" class="form-label">Name Motor</label>
            <input type="text" class="form-control" id="name_motor" name="name_motor" value="{{ $post[0]->name_motor }}" required>
        </div>
        <div class="mb-3">
            <label for="year_production" class="form-label">Year Production</label>
            <input type="number" class="form-control" id="year_production" name="year_production" value="{{ $post[0]->year_production }}" required>
        </div>
        <div class="mb-3">
            <label for="id_brand" class="form-label">Brand</label>
            <select id="id_brand" class="form-control" name="id_brand" required>
                <option value="{{$post[0]->id_brand}}" selected>{{$post[0]->name_brand}}</option>
                @foreach($brand as $brands)
                <option value={{$brands->id}}>{{$brands->name_brand}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="sparepart" class="form-label">Sparepart</label>
            @foreach($sparepart as $spareparts)
                @if(in_array($spareparts->id, explode(',',$post[0]->id_sparepart)))
                    <?php $checked = "checked"; ?>
                @else 
                    <?php $checked = ""?>
                @endif
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="id_sparepart" name="id_sparepart[]"  value="{{$spareparts->id}}" {{$checked}}>
                    <label class="form-check-label" for="sparepart">
                    {{$spareparts->name_sparepart}}
                    </label>
                </div>
            @endforeach
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select id="id_category_motor" name="id_category_motor" class="form-control" required>
                <option value="{{$post[0]->id_category_motor}}" selected>{{$post[0]->name_category_motor}}</option>
                @foreach($category as $categorys)
                <option value={{$categorys->id}}>{{$categorys->name_category_motor}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
        <a href="/motor-menu">
            <i class="fas fa-fw fa-arrow-left"></i>
            <span>Back</span>
        </a>
</div>
@endsection

@push('script')
<script>
    let url = '/motor/'
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
                    data = {
                        _method: "PUT",
                        _token: "{{ csrf_token() }}",
                        name_motor : $('#name_motor').val(),
                        year_production : $('#year_production').val(),
                        id_brand : $('#id_brand').val(),
                        id_sparepart : id_sparepart.join(','),
                        id_category_motor : $('#id_category_motor').val(),
                    }
                    AjaxEdit(url,id,data,"/motor-menu")
                } else {
                    id_sparepart.length = 0;
                }
            });
        });
    })
</script>

@endpush
