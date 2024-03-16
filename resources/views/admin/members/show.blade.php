@extends('layouts.app')

@section('content')
    <h2>Member Details</h2>
    <table class="table">
        <tbody>
            <tr>
                <th>User ID</th>
                <td>{{ $member->id }}</td>
            </tr>
            <tr>
                <th>Member Name</th>
                <td>{{ $member->name }}</td>
            </tr>
            <tr>
                <th>Updated Date</th>
                <td>{{ $member->updated_date }}</td>
            </tr>
            <tr>
                <th>Reward Points</th>
                <td>{{ $member->reward_points }}</td>
            </tr>
        </tbody>
    </table>
@endsection
