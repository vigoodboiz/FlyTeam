
        <h2>Member Details</h2>
        <table class="table">
            <tbody>
                <tr>
                    <th>User ID</th>
                    <td>{{ $member->user_id }}</td>
                </tr>
                <tr>
                    <th>Member Name</th>
                    <td>{{ $member->member_name }}</td>
                </tr>
                <tr>
                    <th>Incentives</th>
                    <td>{{ $member->incentives }}</td>
                </tr>
                <tr>
                    <th>Condition</th>
                    <td>{{ $member->condition }}</td>
                </tr>
                <tr>
                    <th>Updated Date</th>
                    <td>{{ $member->updated_date }}</td>
                </tr>
                <tr>
                    <th>Membership Card</th>
                    <td>{{ $member->membership_card }}</td>
                </tr>
                <tr>
                    <th>Total Target</th>
                    <td>{{ $member->total_target }}</td>
                </tr>
                <tr>
                    <th>Reward Points</th>
                    <td>{{ $member->reward_points }}</td>
                </tr>
            </tbody>
        </table>
