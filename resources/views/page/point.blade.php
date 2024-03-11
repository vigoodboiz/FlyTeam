@extends('welcome')

@section('content')
    <div class="container">
        <h2>Chi tiết khách hàng</h2>
        <br>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Tên khách hàng</th>
                        <th>Ngày cập nhật</th>
                        <th>Điểm thưởng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($members as $member)
                        <tr>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->updated_date }}</td>
                            <td>{{ $member->points }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
