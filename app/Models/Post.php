<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $casts = [
        'content'=> 'array',
    ];

    protected $fillable = [
        'title','content','slug','published','featured_image'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
