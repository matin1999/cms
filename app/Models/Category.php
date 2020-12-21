<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;


//Mutators

    public function setTitleAttribute($value)
    {

        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str::slug(str::random(5) .'_'.$this->attributes['title']);
    }


    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class,'imageable');
    }
}
