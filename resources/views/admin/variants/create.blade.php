@extends('layouts.app')
@section('content')
    <form action="{{ route('variants.store', $products->id) }}" method="POST" enctype="multipart/form-data">

        <a class="btn btn-success" href="{{ route('variants.index', $products->id) }}">Danh sách thuộc tính</a>

        <div class="mb-3">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Tên thuộc tính</label><br>
                <select id="name" name="name" class="form-control" required="required">
                    <option value="Màu sắc">Màu sắc</option>
                    <option value="Trọng lượng">Trọng lượng</option>
                </select>
            </div>
            {{-- <div class="mb-3" id="colorField">
                <label for="color">Chọn màu sắc:</label>
                <input type="color" class="form-control" id="color" name="color">
            </div> --}}

            <div class="mb-3">
                <label for="value">Nhập giá trị</label>
                <input type="text" class="form-control" id="value" name="value">
            </div>

            <button type="submit" class="btn btn-primary">Thêm thuộc tính</button>

    </form>
    {{-- <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
    <script>
        document.getElementById('attribute').addEventListener('change', function() {
            var selectedAttribute = this.value;
            var colorField = document.getElementById('colorField');
            var weightField = document.getElementById('weightField');

            if (selectedAttribute === 'Màu sắc') {
                colorField.style.display = 'block';
                weightField.style.display = 'none';
            } else if (selectedAttribute === 'Trọng lượng') {
                colorField.style.display = 'none';
                weightField.style.display = 'block';
            }
        });
    </script> --}}
@endsection
