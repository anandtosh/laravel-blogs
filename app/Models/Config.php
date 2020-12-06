<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;

    protected $primaryKey = 'key';
    protected $KeyType = 'string';
    protected $casts = [
        'value'=> 'array',
    ];

    public $fillable = [
        'key','value','group'
    ];
}
