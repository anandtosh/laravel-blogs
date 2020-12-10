<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'title','description','slug','published','featured_image','parent_id'
    ];

    public function parent()
    {
        return $this->belongsTo('App\Models\Category','id');
    }

    public function subcategories()
    {
        return $this->hasMany('App\Models\Category','id','parent_id');
    }

}
