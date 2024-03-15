<?php

// app\Models\Member.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// class Member extends Model
// {
//     protected $table = 'members';
//     protected $fillable = [
//         'user_id',
//         'member_name',
//         'incentives',
//         'condition',
//         'updated_date',
//         'membership_card',
//         'total_target',
//         'reward_points',
//     ];

    
// }

class Member extends Model
{
    protected $fillable = ['user_id', 'name','reward_points','updated_date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}


