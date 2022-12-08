<?php

namespace App\Models\Content;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InformationData extends BaseModel
{
    use HasFactory;

    protected $table = 'information_data';

    protected $fillable = [
        'information_id',
        'title',
        'data_type',
        'data',
    ];
}
