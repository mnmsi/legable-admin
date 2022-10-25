<?php

namespace App\Models\User;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserLoggedDevice extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'ip_address', 'device_name', 'browser', 'location', 'logged_at', 'is_online'
    ];
}
