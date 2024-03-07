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
            @foreach($Role as $member)
            <tr>
                <td>{{ $member->id }}</td>
                <td>{{ $member->name }}</td>
                <td>{{ $member->updated_date }}</td>
                <td>{{ $member->reward_points }}</td>
                <td>  <a href="{{ route('members.show', $member->id) }}" class="btn btn-info">View</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
        <a href="{{ route('members.ranking') }}" class="btn btn-primary"> Ranking </a>
@endsection 