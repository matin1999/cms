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
        $this->attributes['slug'] = Str::random(7). "-" .Str::slug($value);
    }
//relations

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
