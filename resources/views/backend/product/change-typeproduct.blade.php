<label>Loại Sản Phẩm</label>
<select class="form-control single-select" name="typeproduct_id" required>
    @if (!empty($typeproducts))
        @foreach ($typeproducts as $typeproduct)
            <option value="{{$typeproduct['id']}}">{{$typeproduct['name']}}</option>
        @endforeach
    @else
        <option value="0" selected></option>
    @endif
</select>
