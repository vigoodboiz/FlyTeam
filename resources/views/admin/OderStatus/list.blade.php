@extends('layouts.app')

@section('content')
    <<<<<<< HEAD <h1>{{ $title }}</h1> <br>
        <table class="table">

            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">ODER_ID</th>
                    <th scope="col">USER</th>
                    <th scope="col">CART</th>
                    <th scope="col">PRODUCT</th>
                    <th scope="col">PRODUCT</th>
                    <th scope="col">STATUS</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($listOder_status as $oder)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <th scope="row">#1234{{ $oder->id }}</th>
                        <td>{{ $oder->user->name }}</td>
                        <td>{{ $oder->cart_id }}</td>
                        <td>{{ $oder->product->name }}</td>
                        <td>{{ $oder->product->price }}</td>
                        <td class="form-group">
                            <select class="form-control status-select" data-oder-id="{{ $oder->id }}">
                                <option value="Đang Xác Nhận"
                                    {{ $oder->payment_status == 'Đang Xác Nhận' ? 'selected' : '' }}>
                                    Đang Xác Nhận</option>
                                <option value="Đã xác nhận" {{ $oder->payment_status == 'Đã xác nhận' ? 'selected' : '' }}>
                                    Đã
                                    xác nhận</option>
                                <option value="Đã thanh toán"
                                    {{ $oder->payment_status == 'Đã thanh toán' ? 'selected' : '' }}>
                                    Đã thanh toán</option>
                                <option value="Đã hủy đơn hàng"
                                    {{ $oder->payment_status == 'Đã hủy đơn hàng' ? 'selected' : '' }}>Đã hủy đơn hàng
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
                    var oderId = $(this).data('oder-id');
                    var newStatus = $(this).val();

                    $.ajax({
                        url: '{{ route('updateOder_status') }}',
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
