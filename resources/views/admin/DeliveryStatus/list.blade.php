@extends('layouts.app')

@section('content')
    <h1>{{ $title }}</h1><br>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Mã đơn hàng</th>
                <th scope="col">Tên khách hàng</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Giá sản phẩm</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Trạng thái đơn hàng</th>
                <th scope="col">Trạng thái</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($listDelivery_status as $oder)
                <tr>
                    <th scope="row">#1234{{ $oder->id }}</th>
                    <td>{{ $oder->user->name }}</td>
                    <td>{{ $oder->product->name }}</td>
                    <td>{{ $oder->product->price }}</td>
                    <td>{{ $oder->user->address }}</td>
                    <td>{{ $oder->payment_status }}</td>
                    <td class="form-group">
                        <select class="form-control delivery-select" data-delivery-id="{{ $oder->id }}">
                            <option value="Đang xử lý" {{ $oder->delivery_status == 'Đang xử lý' ? 'selected' : '' }}>
                                Đang
                                Xử Lý</option>
                            <option value="Đang Giao Hàng"
                                {{ $oder->delivery_status == 'Đang Giao Hàng' ? 'selected' : '' }}>Đang Giao Hàng
                            </option>
                            <option value="Đã Giao Hàng" {{ $oder->delivery_status == 'Đã giao hàng' ? 'selected' : '' }}>
                                Đã
                                giao hàng</option>
                            <option value="Không thể xử lí giao hàng"
                                {{ $oder->delivery_status == 'Không thể xử lí giao hàng' ? 'selected' : '' }}>Không thể
                                xử
                                lí giao hàng</option>
                        </select>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $listDelivery_status->links() }}
@endsection

@section('update-delivery')
    <script>
        $(document).ready(function() {
            $('.delivery-select').on('change', function() {
                var oderId = $(this).data('delivery-id');
                var newStatus = $(this).val();

                $.ajax({
                    url: '{{ route('updateDelivery_status') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: oderId,
                        status: newStatus
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
