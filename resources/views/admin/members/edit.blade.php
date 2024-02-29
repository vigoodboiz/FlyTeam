@extends('layouts.app')

@section('content')
        <h2>Edit Member</h2>
        <form method="POST" action="{{ route('members.update', $member->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="user_id">User ID:</label>
                <input type="text" class="form-control" id="user_id" name="user_id" value="{{ $member->user_id }}" readonly>
            </div>

            <div class="form-group">
                <label for="member_name">Member Name:</label>
                <input type="text" class="form-control" id="member_name" name="member_name" value="{{ $member->member_name }}">
            </div>

            <div class="form-group">
                <label for="incentives">Incentives:</label>
                <input type="text" class="form-control" id="incentives" name="incentives" value="{{ $member->incentives }}">
            </div>

            <div class="form-group">
                <label for="condition">Condition:</label>
                <input type="text" class="form-control" id="condition" name="condition" value="{{ $member->condition }}">
            </div>

            <div class="form-group">
                <label for="membership_card">Membership Card:</label>
                <input type="text" class="form-control" id="membership_card" name="membership_card" value="{{ $member->membership_card }}">
            </div>

            <div class="form-group">
                <label for="total_target">Total Target:</label>
                <input type="number" class="form-control" id="total_target" name="total_target" value="{{ $member->total_target }}">
            </div>

            <div class="form-group">
                <label for="reward_points">Reward Points:</label>
                <input type="number" class="form-control" id="reward_points" name="reward_points" value="{{ $member->reward_points }}">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        @endsection