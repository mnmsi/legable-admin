<?php

namespace App\Models\Content;

use App\Casts\InformationDataCast;
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

    protected $casts = [
        'data' => InformationDataCast::class
    ];
}
