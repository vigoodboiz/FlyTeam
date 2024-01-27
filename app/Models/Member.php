<?php

// app\Models\Member.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';
    protected $fillable = [
        'user_id',
        'member_name',
        'incentives',
        'condition',
        'updated_date',
        'membership_card',
        'total_target',
        'reward_points',
    ];

    // Các phương thức và tương tác khác có thể được thêm vào đây
}

