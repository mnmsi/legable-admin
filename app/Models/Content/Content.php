<?php

namespace App\Models\Content;

use App\Casts\FileUrlCast;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Content extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'content_type',
        'parent_id',
        'name',
        'password',
        'file_url',
        'is_password_required',
        'is_able_use_master_key',
        'uses_at',
        'created_at',
        'updated_at'
    ];

    protected $hidden = [
        'password'
    ];

    protected $casts = [
        'file_url' => FileUrlCast::class
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->user_id = Auth::id();
        });
    }

    protected function password(): Attribute
    {
        return Attribute::set(fn($value) => Hash::make($value));
    }

    protected function isPasswordRequired(): Attribute
    {
        return Attribute::set(fn($value) => $value == 'on' ? 1 : 0);
    }

    protected function isAbleUseMasterKey(): Attribute
    {
        return Attribute::set(fn($value) => $value == 'on' ? 1 : 0);
    }
}
