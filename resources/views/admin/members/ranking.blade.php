@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Thành viên xếp hạng</h1>

    @if ($rankings->has('A') || $rankings->has('B') || $rankings->has('C'))
        <div class="row">
            @if ($rankings->has('A'))
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-info text-white">
                            Thành viên kim cương (Điểm >= 80)
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Tên</th>
                                        <th>Điểm</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($rankings['A'] as $member)
                                        <tr>
                                            <td>{{ $member->name }}</td>
                                            <td>{{ $member->reward_points }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif

            @if ($rankings->has('B'))
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-warning">
                            Thành viên vàng (60 <= Điểm < 80)
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Tên</th>
                                        <th>Điểm</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($rankings['B'] as $member)
                                        <tr>
                                            <td>{{ $member->name }}</td>
                                            <td>{{ $member->reward_points }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif

            @if ($rankings->has('C'))
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-secondary text-white">
                            Thành viên bạc (Điểm < 60)
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Tên</th>
                                        <th>Điểm</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($rankings['C'] as $member)
                                        <tr>
                                            <td>{{ $member->name }}</td>
                                            <td>{{ $member->reward_points }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    @else
        <p>Không có thành viên trong khoảng xếp hạng.</p>
    @endif

    <a href="{{ route('members.index') }}" class="btn btn-primary mt-3">Quay lại danh sách thành viên</a>
</div>
@endsection
