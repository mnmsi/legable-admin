<?php

namespace App\Models\Content;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InformationType extends BaseModel
{
    use HasFactory;

    protected $table = 'information_types';

    protected $fillable = [
        'name',
    ];
}
