<?php

namespace App\Models\User;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class UserLoggedDevice extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'ip_address', 'device_name', 'browser', 'location', 'logged_at', 'is_online', 'session_id'
    ];

    protected static function booted()
    {
        parent::booted();
        static::addGlobalScope('user', function (Builder $builder) {
            $builder->where('user_id', Auth::id());
        });
    }
}
