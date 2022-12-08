<?php

namespace App\Models\Content;

use App\Models\BaseModel;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Information extends BaseModel
{
    use HasFactory;

    protected $table = 'information';

    protected $fillable = [
        'user_id',
        'information_type_id',
    ];

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
}
