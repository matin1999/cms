<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    public $timestamps=false;

    public function setAltAttribute($value)
    {
        $this->attributes['alt'] =$value ?? $this->attributes['title'];
    }
//  relations
    public function imageable()
    {
        return $this->morphTo();
    }
}
