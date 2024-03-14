@extends('layouts.app')
@section('content')
    <?php
    use Illuminate\Support\Facades\Session;
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">Danh sách khuyến mại</h4>
                    </div>
                    <div>
                        @can('coupon_create')
                            <a href="{{ route('insert_coupon') }}" class="btn btn-primary add-list"><i
                                    class="las la-plus mr-3"></i>Thêm khuyến mại</a>
                        @endcan
                    </div>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Tên mã giảm giá</th>
                        <th>Ngày bắt đầu</th>
                        <th>Ngày kết thúc</th>
                        <th>Mã giảm giá</th>
                        {{-- <th>Số lượng mã</th> --}}
                        <th>Điều kiện giảm giá</th>
                        <th>Số giảm</th>
                        <th>Trạng thái</th>
                        <th> Chức năng</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($coupon as $key => $cou)
                        <tr>
                            <td>{{ $cou->coupon_name }}</td>
                            <td>{{ $cou->coupon_date_start }}</td>
                            <td>{{ $cou->coupon_date_end }}</td>
                            <td>{{ $cou->coupon_code }}</td>
                            {{-- <td>{{ $cou->coupon_time }}</td> --}}
                            <td><span class="text-ellipsis">
                                    <?php
                            if ($cou->coupon_condition == 1) {
                            ?>
                                    Giảm theo %
                                    <?php
                            } else {
                            ?>
                                    Giảm theo tiền
                                    <?php
                            }
                            ?>
                                </span>
                            </td>
                            <td><span class="text-ellipsis">
                                    <?php
                            if ($cou->coupon_condition == 1) {
                            ?>
                                    Giảm {{ $cou->coupon_number }} %
                                    <?php
                            } else {
                            ?>
                                    Giảm {{ $cou->coupon_number }} VNĐ
                                    <?php
                            }
                            ?>
                                </span></td>
                            <td><span class="text-ellipsis">
                                    <?php
                            if ($cou->coupon_status == 1) {
                            ?>
                                    <span style="color: green">Đang hoạt động</span>
                                    <?php
                            } else {
                            ?>
                                    <span style="color: red">Đã khóa</span>

                                    <?php
                            }
                            ?>
                                </span>
                            </td>
                            <td><span class="text-ellipsis">
                                    <?php
                            if ($cou->coupon_date_end >= $today) {
                            ?>
                                    <span style="color: green">Còn hạn</span>
                                    <?php
                            } else {
                            ?>
                                    <span style="color: red">Đã hết hạn</span>

                                    <?php
                            }
                            ?>
                                </span>
                            </td>


                            <td>
                                @can('coupon_delete')
                                    <form id="delete-form" action="{{ route('delete_coupon', $cou->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" type="submit" id="delete-button"><i
                                                class="fa fa-trash mr-0"></i></button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
