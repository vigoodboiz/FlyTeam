@extends('layouts.app')

@section('content')
    <h1>Member</h1>
    <table class="table">
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
            @foreach ($members as $member)
                <tr>
                    <td scope="row">{{ $member->id }}</td>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->updated_date }}</td>
                    <td>{{ $member->reward_points }}</td>
                    <td> <a href="{{ route('members.show', $member->id) }}" class="btn btn-info"><i
                                class="fa fa-eye mr-0"></i></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @can('member_ranking')
        <a href="{{ route('members.ranking') }}" class="btn btn-primary"> Ranking </a>
    @endcan
@endsection
