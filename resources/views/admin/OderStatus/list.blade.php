@extends('layouts.app')

@section('content')
<h1>{{ $title }}</h1> <br>
<table class="table">

    <thead>
        <tr>
            <th scope="col">Stt</th>
            <th scope="col">Mã đơn hàng</th>
            <th scope="col">Tên khách hàng</th>
            {{-- <th scope="col">CART</th> --}}
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Giá sản phẩm</th>
            <th scope="col">Trạng thái</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($listOder_status as $oder)
        <tr>
            <td>{{ ++$i }}</td>
            <th scope="row">#1234{{ $oder->id }}</th>
            <td>{{ $oder->user->name }}</td>
            {{-- <td>{{ $oder->cart_id }}</td> --}}
            <td>{{ $oder->product->name }}</td>
            <td>{{ $oder->product->price }}</td>
            <td class="form-group">
                <select class="form-control status-select" data-oder-id="{{ $oder->id }}">
                    <option value="Đang xác nhận" {{ $oder->payment_status == 'Đang xác nhận' ? 'selected' : '' }}>
                        Đang xác nhận</option>
                    <option value="Đã xác nhận" {{ $oder->payment_status == 'Đã xác nhận' ? 'selected' : '' }}>
                        Đã
                        xác nhận</option>
                    <option value="Đã thanh toán" {{ $oder->payment_status == 'Đã thanh toán' ? 'selected' : '' }}>
                        Đã thanh toán</option>
                    <option value="Đã hủy đơn hàng" {{ $oder->payment_status == 'Đã hủy đơn hàng' ? 'selected' : '' }}>Đã hủy đơn hàng
                    </option>
                </select>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>
{{ $listOder_status->links() }}
@endsection

@section('update-status')
<script>
    $(document).ready(function() {
        $('.status-select').on('change', function() {
            var selectedOption = $(this).val();
            var selectId = $(this).attr('id');

            // Vô hiệu hóa các tùy chọn trước đó
            $(this).prevAll('option').prop('disabled', true);

            // Gửi yêu cầu Ajax
            $.ajax({
                url: '{{ route('updateOder_status') }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: selectId,
                    status: selectedOption
                },
                success: function(response) {
                    // Xử lý thành công
                    console.log(response);
                },
                error: function(xhr) {
                    // Xử lý lỗi
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>
@endsection