@extends('layouts.app')

@section('content')
    <h1>Member</h1>
    <table class="table mt-3" border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Updated Date</th>
                <th>Points</th>
                <th>Action</th>
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
        <a href="{{ route('members.ranking') }}" class="btn btn-primary"> Ranking </a>
    @endcan
@endsection
