<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tag extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;

//Mutators

    public function setTitleAttribute($value)
    {

        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str::slug(str::random(5) .''.$this->attributes['title']);
    }
//relations

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
