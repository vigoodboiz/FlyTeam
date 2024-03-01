@extends('layouts.app')
@section('content')
<?php

use Illuminate\Support\Facades\Session;
?>
<h1>Danh sách mã khuyến mãi</h1><br>
<div class="table-responsive">
    @can('coupon_create')
    <a class="btn btn-primary" href="{{ route('insert_coupon') }}">Thêm</a>
    @endcan
    <br>
    <br>
    <?php
    $message = Session::get('message');
    if ($message) {
        echo '<span class="text-alert">' . $message . '</span>';
        Session::put('message', null);
    }
    ?>

    <table border="1">
        <thead>
            <tr>


                <th>Tên mã giảm giá</th>
                <th>Ngày bắt đầu</th>
                <th>Ngày kết thúc</th>
                <th>Mã giảm giá</th>
                <th>Số lượng mã</th>
                <th>Điều kiện giảm giá</th>
                <th>Số giảm</th>
                <th>Trạng thái</th>
                <th>Hết hạn</th>
                <th> Chức năng</th>

            </tr>
        </thead>
        <tbody>

            @foreach ($coupon as $key => $cou)
            <tr>
                <td>{{ $cou->coupon_name }}</td>
                <td>{{ $cou->coupon_date_start }}</td>
                <td>{{ $cou->coupon_date_end}}</td>
                <td>{{ $cou->coupon_code }}</td>
                <td>{{ $cou->coupon_time }}</td>
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
                    @can('coupon_create')
                    <center><a onclick="return confirm('Bạn có chắc là muốn xóa mã này ko?')" href="{{ route('delete_coupon', $cou->id) }}">
                            <i class="fa fa-times text-danger text"></i>
                        </a></center>
                    @endcan
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</div>
@endsection