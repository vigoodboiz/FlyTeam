@extends('layouts.app')
@section('content')
    <form action="{{ route('variants.store') }}" method="POST" enctype="multipart/form-data">

        <a class="btn btn-success" href="{{ route('variants.index') }}">Danh sách thuộc tính</a>

        <div class="mb-3">
            @csrf
            <div class="form-group">
                <label for="product_id">Chọn sản phẩm:</label>
                <select name="product_id" class="form-control" id="product_id">
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Tên thuộc tính</label>
                <select name="name" id="inputName" class="form-control" required="required">
                    <option value="Màu sắc">Màu sắc</option>
                    <option value="Trọng lượng">Trọng lượng</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="value" class="form-label">Giá trị</label>
                <input type="text" name="value" id="v2" class="form-control">
            </div>
            {{-- <div class="mb-3" style="display: none">
                <label for="value" class="form-label">Giá trị</label>
                <input type="text" name="" id="v1" class="form-control" value="">
            </div> --}}

            <button type="submit" class="btn btn-primary">Thêm thuộc tính</button>

    </form>
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
    <script>
        $('#inputName').change(function(event) {
            var _ip = $('#inputName').val();
            if (_ip == 'Trọng lượng') {
                $('.value2').show();
                $('#v2').variants({
                    name: 'value',
                });
                $('.mb-3 value1').hide();
                $('#v1').variants({
                    name: '',
                });
            } else {
                $('.value1').show();
                $('#v1').variants({
                    name: 'value',
                });
                $('.value2').hide();
                $('#v2').variants({
                    name: '',
                });
            }
        });
    </script>
@endsection
