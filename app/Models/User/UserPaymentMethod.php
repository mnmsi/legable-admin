<?php

namespace App\Models\User;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class UserPaymentMethod extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'brand',
        'number',
        'exp_month',
        'exp_year',
        'is_active'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->user_id = Auth::id();

            if ($model->count() === 0) {
                $model->is_active = 1;
            }
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
