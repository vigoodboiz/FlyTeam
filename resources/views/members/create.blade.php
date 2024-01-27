

    <div class="container">
        <h2>Create Member</h2>
        <form action="{{ route('members.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="user_id">User ID:</label>
                <input type="text" name="user_id" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="member_name">Member Name:</label>
                <input type="text" name="member_name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="incentives">Incentives:</label>
                <input type="text" name="incentives" class="form-control">
            </div>

            <div class="form-group">
                <label for="condition">Condition:</label>
                <input type="text" name="condition" class="form-control">
            </div>

            <div class="form-group">
                <label for="membership_card">Membership Card:</label>
                <input type="text" name="membership_card" class="form-control">
            </div>

            <div class="form-group">
                <label for="total_target">Total Target:</label>
                <input type="number" name="total_target" class="form-control">
            </div>

            <div class="form-group">
                <label for="reward_points">Reward Points:</label>
                <input type="number" name="reward_points" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Create Member</button>
        </form>
    </div>



