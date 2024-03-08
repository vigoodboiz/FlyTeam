@extends('welcome')

@section('content')

<div class="container">
    <h2>Member Details</h2>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Member Name</th>
                    <th>Updated Date</th>
                    <th>Reward Points</th>
                </tr>
            </thead>
            <tbody>
                @foreach($members as $member)
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
