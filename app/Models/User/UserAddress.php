<?php

namespace App\Models\User;

use App\Models\BaseModel;
use App\Models\System\Country;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class UserAddress extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'country',
        'city',
        'region',
        'address_line_one',
        'address_line_two',
        'status',
        'zip',
        'created_at',
        'updated_at'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->user_id = Auth::id();
        });
    }

    public function countryInfo()
    {
        return $this->belongsTo(Country::class, 'country');
    }
}
