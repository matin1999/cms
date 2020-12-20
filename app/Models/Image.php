<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model


{
    use HasFactory;
    protected $guarded=[];
    public $timestamps=false;

    public function getUrlAttribute()
    {
        return Storage::url($this->attributes['path']);
    }

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
