@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">Danh sách thành viên</h4>
                    </div>
                </div>
            </div>
            <table class="table mt-3" border="1">
                <thead>
                    <tr>
                        <th>Id khách hàng</th>
                        <th>Tên khách hàng</th>
                        <th>Ngày cập nhật</th>
                        <th>Điểm</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Role as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>
                                @foreach ($members as $member)
                                    @if ($member->user_id == $role->id)
                                        {{ $member->name }}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($members as $member)
                                    @if ($member->user_id == $role->id)
                                        {{ $member->updated_date }}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($members as $member)
                                    @if ($member->user_id == $role->id)
                                        {{ $member->reward_points }}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($members as $member)
                                    @if ($member->user_id == $role->id)
                                        <a href="{{ route('members.show', $member->id) }}" class="btn btn-info">View</a>
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            @can('member_ranking')
                <a href="{{ route('members.ranking') }}" class="btn btn-primary"> Thứ hạng </a>
            @endcan
        </div>
    @endsection
