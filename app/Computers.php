<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Computers extends Model
{
    protected $fillable = [
        'provider',
        'brand_label',
        'location',
        'cpu',
        'drive_label',
        'price',
        'provider_name'
    ];
}
