<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use function GuzzleHttp\Psr7\str;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

//Mutators

    public function setTitleAttribute($value)
    {
        $this->attributes['title']=$value;
        $this->attributes['slug'] = str::slug(str::random(5).''.$this->attributes['title']);
    }

//relations

    public function author()
    {

        return $this->belongsTo(User::class,'user_id');

    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class,);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }


}
