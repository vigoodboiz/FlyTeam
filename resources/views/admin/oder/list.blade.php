@extends('layouts.app')

@section('content')
    <style>
        /* Custom CSS */
        /* Định dạng cho tiêu đề của bảng */
        .table-title {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        /* Định dạng cho các dòng chẵn của bảng */
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f6f6f6;
        }

        /* Định dạng cho hover của dòng */
        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }

        .table th {
            white-space: nowrap;
        }

        .responsive-table th {
            white-space: nowrap;
        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h2 class="table-title">Danh sách đơn hàng</h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã đơn hàng</th>
                                <th>Tên khách hàng</th>
                                <th>Ảnh sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                {{-- <th>Giá sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Tổng tiền</th>
                                <th>Ghi chú</th> --}}
                                <th>Trạng thái đơn hàng</th>
                                <th>Trạng thái giao hàng</th>
                                <th>Ngày đặt hàng</th>
                                <th>Chi tiết</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listOder as $item)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <th scope="row">#1234{{ $item->id }}</th>
                                    <td>{{ $item->user->name }}</td>
                                    <td>

                                        <img class="border-radius-5"
                                            src="{{ asset('upload/public/images/' . $item->product->image) }}"
                                            alt="cart-product">

                                    </td>
                                    <td>

                                        {{ Illuminate\Support\Str::limit($item->product->name, 30) }}

                                    </td>
                                    {{-- <td>

                                        {{ $item->product->price }}

                                    </td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->total_price }}đ</td>
                                    <td>{{ $item->note }}</td> --}}
                                    <td class="form-group ">
                                        @if ($item->payment_status == 'Đang xác nhận')
                                            <select class="form-control status-select" data-oder-id="{{ $item->id }}">
                                                <option value="Đang xác nhận" selected>Đang xác nhận</option>
                                                <option value="Đã xác nhận">Đã xác nhận</option>
                                                <option value="Đã thanh toán">Đã thanh toán</option>
                                                <option value="Đã hủy đơn hàng">Đã hủy đơn hàng</option>
                                            </select>
                                        @endif
                                        @if ($item->payment_status == 'Đã xác nhận')
                                            <select class="form-control status-select" data-oder-id="{{ $item->id }}">
                                                <option style="background-color: #FAC9DC;" value="Đang xác nhận" disabled>
                                                    Đang xác nhận</option>
                                                <option value="Đã xác nhận" selected>Đã xác nhận</option>
                                                <option value="Đã thanh toán">Đã thanh toán</option>
                                                <option value="Đã hủy đơn hàng">Đã hủy đơn hàng</option>
                                            </select>
                                        @endif
                                        @if ($item->payment_status == 'Đã thanh toán')
                                            <select class="form-control status-select" data-oder-id="{{ $item->id }}">
                                                <option style="background-color: #FAC9DC;" value="Đang xác nhận" disabled>
                                                    Đang xác nhận</option>
                                                <option style="background-color: #FAC9DC;" value="Đã xác nhận" disabled> Đã
                                                    xác nhận</option>
                                                <option value="Đã thanh toán" selected>Đã thanh toán</option>
                                                <option value="Đã hủy đơn hàng">Đã hủy đơn hàng</option>
                                            </select>
                                        @endif
                                        @if ($item->payment_status == 'Đã hủy đơn hàng')
                                            <select class="form-control status-select" data-oder-id="{{ $item->id }}">
                                                <option style="background-color: #FAC9DC;" value="Đang xác nhận" disabled>
                                                    Đang xác nhận</option>
                                                <option style="background-color: #FAC9DC;" value="Đã xác nhận" disabled>Đã
                                                    xác nhận</option>
                                                <option style="background-color: #FAC9DC;" value="Đã thanh toán" disabled>Đã
                                                    thanh toán</option>
                                                <option value="Đã hủy đơn hàng" selected>Đã hủy đơn hàng</option>
                                            </select>
                                        @endif
                                    </td>
                                    <td class="form-group">
                                        @if ($item->delivery_status == 'Đang xử lý')
                                            <select class="form-control delivery-select"
                                                data-delivery-id="{{ $item->id }}">
                                                <option value="Đang xử lý" selected>Đang xử lý</option>
                                                <option value="Đang giao hàng">Đang giao hàng</option>
                                                <option value="Đã giao hàng">Đã giao hàng</option>
                                                <option value="Không thể xử lí giao hàng">Không thể xử lí giao hàng</option>
                                            </select>
                                        @endif
                                        @if ($item->delivery_status == 'Đang giao hàng')
                                            <select class="form-control delivery-select"
                                                data-delivery-id="{{ $item->id }}">
                                                <option style="background-color: #FAC9DC;" value="Đang xử lý" disabled>Đang
                                                    xử lý</option>
                                                <option value="Đang giao hàng" selected>Đang giao hàng</option>
                                                <option value="Đã giao hàng">Đã giao hàng</option>
                                                <option value="Không thể xử lí giao hàng">Không thể xử lí giao hàng</option>
                                            </select>
                                        @endif
                                        @if ($item->delivery_status == 'Đã giao hàng')
                                            <select class="form-control delivery-select"
                                                data-delivery-id="{{ $item->id }}">
                                                <option style="background-color: #FAC9DC;" value="Đang xử lý" disabled>Đang
                                                    xử lý</option>
                                                <option style="background-color: #FAC9DC;" value="Đang giao hàng" disabled>
                                                    Đang giao hàng</option>
                                                <option value="Đã giao hàng" selected>Đã giao hàng</option>
                                                <option value="Không thể xử lí giao hàng">Không thể xử lí giao hàng</option>
                                            </select>
                                        @endif
                                        @if ($item->delivery_status == 'Không thể xử lí giao hàng')
                                            <select class="form-control delivery-select"
                                                data-delivery-id="{{ $item->id }}">
                                                <option style="background-color: #FAC9DC;" value="Đang xử lý" disabled>Đang
                                                    xử lý</option>
                                                <option style="background-color: #FAC9DC;" value="Đang giao hàng" disabled>
                                                    Đang giao hàng</option>
                                                <option style="background-color: #FAC9DC;" value="Đã giao hàng" disabled>Đã
                                                    giao hàng</option>
                                                <option value="Không thể xử lí giao hàng" selected>Không thể xử lí giao hàng
                                                </option>
                                            </select>
                                        @endif
                                    </td>
                                    <td>{{ $item->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <button class="btn btn-info"><a data-toggle="tooltip" data-placement="top"
                                                title="Chi tiết" data-original-title="Edit"
                                                href="{{ route('showOrder', $item->id) }}"><i
                                                    class="fa-solid fa-eye"></i></a></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $listOder->links() }}
                </div>
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
                        window.location.reload();
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
                        window.location.reload();
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
