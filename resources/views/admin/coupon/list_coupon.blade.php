@extends('layouts.app')
@section('content')
    <?php
    
    use Illuminate\Support\Facades\Session;
    ?>
    <h1>Danh sách mã khuyến mãi</h1><br>
    <div class="table-responsive">
        @can('coupon_create')
            <a class="btn btn-primary" href="{{ route('insert_coupon') }}">New Coupon</a>
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

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Tên mã giảm giá</th>
                    <th scope="col">Mã giảm giá</th>
                    <th scope="col">Số lượng giảm giá</th>
                    <th scope="col">Điều kiện giảm giá</th>
                    <th scope="col">Số giảm</th>
                    <th scope="col"> Chức năng</th>

                </tr>
            </thead>
            <tbody>

                @foreach ($coupon as $key => $cou)
                    <tr>
                        <td scope="row">{{ $cou->coupon_name }}</td>
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

                        <td>
                            @can('coupon_create')
                                <center><a onclick="return confirm('Bạn có chắc là muốn xóa mã này ko?')"
                                        href="{{ route('delete_coupon', $cou->id) }}">
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
