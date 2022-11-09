<?php

namespace App\Models\System;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserVerification extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'gateway', 'otp', 'expires_at'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->user_id = Auth::id();
        });
    }

    protected static function booted()
    {
        parent::booted();
        static::addGlobalScope('user', function (Builder $builder) {
            $builder->where('user_id', Auth::id());
        });
    }
}
