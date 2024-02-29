@extends('layouts.app')

@section('content')
    <h1>Member</h1>
    @can('member_create')
        <a href="{{ route('members.create') }}" class="btn btn-primary">Create Member</a>
    @endcan
    <table class="table mt-3" border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>User ID</th>
                <th>Member Name</th>
                <th>Incentives</th>
                <th>Condition</th>
                <th>Updated Date</th>
                <th>Membership Card</th>
                <th>Total Target</th>
                <th>Reward Points</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($members as $member)
                <tr>
                    <td>{{ $member->id }}</td>
                    <td>{{ $member->user_id }}</td>
                    <td>{{ $member->member_name }}</td>
                    <td>{{ $member->incentives }}</td>
                    <td>{{ $member->condition }}</td>
                    <td>{{ $member->updated_date }}</td>
                    <td>{{ $member->membership_card }}</td>
                    <td>{{ $member->total_target }}</td>
                    <td>{{ $member->reward_points }}</td>
                    <td>
                        @can('member_show')
                            <a href="{{ route('members.show', $member->id) }}" class="btn btn-info">View</a>
                        @endcan
                        @can('member_edit')
                            <a href="{{ route('members.edit', $member->id) }}" class="btn btn-warning">Edit</a>
                        @endcan
                        @can('member_delete')
                            <form action="{{ route('members.destroy', $member->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @can('member_ranking')
        <a href="{{ route('members.ranking') }}" class="btn btn-primary"> Ranking </a>
    @endcan
@endsection
