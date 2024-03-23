@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                <div>
                    <h4 class="mb-3">Danh sách đơn hàng</h4>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="table-responsive rounded mb-3">
                <table class="data-table table mb-0 tbl-server-info">
                    <thead class="bg-white text-uppercase">
                        <tr>
                            <th>STT</th>
                            <th>Mã đơn hàng</th>
                            <th>Tên khách hàng</th>
                            <th>Ảnh sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Tổng tiền</th>
                            <th>Ghi chú</th>
                            <th>Trạng thái đơn hàng</th>
                            <th>Trạng thái giao hàng</th>
                            <th>Ngày đặt hàng</th>
                        </tr>
                    </thead>
                    <tbody class="ligth-body">
                        @foreach ($listOder as $item)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <th scope="row">#1234{{ $item->id }}</th>
                            <td>{{ $item->user->name }}</td>
                            {{-- <td>{{ $item->user->email }}</td>
                            <td>{{ $item->user->phone }}</td>
                            <td>{{ $item->user->address }}</td> --}}
                            <td>

                                <img class="border-radius-5" src="{{ asset('upload/public/images/' . $item->product->image) }}" alt="cart-product">

                            </td>
                            <td>

                                {{ $item->product->name }}

                            </td>
                            <td>

                                {{ $item->product->price }}

                            </td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->total_price }}đ</td>
                            <td>{{ $item->note }}</td>
                            <td class="form-group">
                                <select class="form-control status-select" data-oder-id="{{ $item->id }}">
                                    <option value="Đang xác nhận" {{ $item->payment_status == 'Đang xác nhận' ? 'selected' : '' }}>
                                        Đang xác nhận</option>
                                    <option value="Đã xác nhận" {{ $item->payment_status == 'Đã xác nhận' ? 'selected' : '' }}>
                                        Đã
                                        xác nhận</option>
                                    <option value="Đã thanh toán" {{ $item->payment_status == 'Đã thanh toán' ? 'selected' : '' }}>
                                        Đã thanh toán</option>
                                    <option value="Đã hủy đơn hàng" {{ $item->payment_status == 'Đã hủy đơn hàng' ? 'selected' : '' }}>Đã hủy đơn hàng
                                    </option>
                                </select>
                            </td>
                            <td class="form-group">
                                <select class="form-control delivery-select" data-delivery-id="{{ $item->id }}">
                                    <option value="Đang xử lý" {{ $item->delivery_status == 'Đang xử lý' ? 'selected' : '' }}>
                                        Đang Xử Lý</option>
                                    <option value="Đang Giao Hàng" {{ $item->delivery_status == 'Đang Giao Hàng' ? 'selected' : '' }}>Đang Giao Hàng
                                    </option>
                                    <option value="Đã Giao Hàng" {{ $item->delivery_status == 'Đã giao hàng' ? 'selected' : '' }}>
                                        Đã giao hàng</option>
                                    <option value="Không thể xử lí giao hàng" {{ $item->delivery_status == 'Không thể xử lí giao hàng' ? 'selected' : '' }}>Không thể
                                        xử lí giao hàng</option>
                                </select>
                            </td>
                            <td>{{ $item->created_at->format('d/m/Y') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $listOder->links() }}
            </div>
        </div>
    </div>
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