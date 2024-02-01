
    <h1>Thành viên xếp hạng</h1>
    
    @if ($rankings->has('A'))
        <h2>Thành viên kim cương (Điểm >= 80)</h2>
        <table>
            <thead>
                <tr>
                    <th>Tên</th>
                    <th>Điểm</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rankings['A'] as $member)
                    <tr>
                        <td>{{ $member->member_name }}</td>
                        <td>{{ $member->reward_points }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    @if ($rankings->has('B'))
        <h2>Thành viên vàng (60 <= Điểm < 80)</h2>
        <table>
            <thead>
                <tr>
                    <th>Tên</th>
                    <th>Điểm</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rankings['B'] as $member)
                    <tr>
                        <td>{{ $member->member_name }}</td>
                        <td>{{ $member->reward_points }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    @if ($rankings->has('C'))
        <h2>Thành viên bạc (Điểm < 60)</h2>
        <table>
            <thead>
                <tr>
                    <th>Tên</th>
                    <th>Điểm</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rankings['C'] as $member)
                    <tr>
                        <td>{{ $member->member_name }}</td>
                        <td>{{ $member->reward_points }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    @if (!$rankings->has('A') && !$rankings->has('B') && !$rankings->has('C'))
        <p>Không có thành viên trong khoảng xếp hạng.</p>
    @endif

    <a href="{{ route('members.index') }}" class="btn btn-primary"> Member</a>
