<?php

namespace App\Models\Subscription;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class Subscription extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'plan_id', 'card_id', 'expires_at', 'plan_amount'
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
