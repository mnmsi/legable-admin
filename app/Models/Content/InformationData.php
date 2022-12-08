<?php

namespace App\Models\Content;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InformationData extends BaseModel
{
    protected $table = 'information_data';

    protected $fillable = [
        'information_id',
        'title',
        'data_type',
        'data',
    ];

    public function data(): Attribute
    {
        return Attribute::make(
            get: fn($value) => myDecrypt($value),
            set: fn($value) => myEncrypt($value),
        );
    }
}
