<?php

namespace App\Models\Content;

use App\Models\BaseModel;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class Information extends BaseModel
{
    protected $table = 'information';

    protected $fillable = [
        'user_id',
        'information_type_id',
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

    public function informationType()
    {
        return $this->belongsTo(InformationType::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function informationData()
    {
        return $this->belongsToMany($this::class, 'information_data', 'information_id');
    }

    public function hasManyInformationData()
    {
        return $this->hasMany(InformationData::class, 'information_id');
    }
}
