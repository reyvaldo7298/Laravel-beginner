<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hobby extends Model
{
    use HasFactory;

    public function employee()
    {
        return $this->belongsToMany(Employee::class);
    }

    // public function image()
    // {
    //     return $this->morphOne(Image::class, 'imageable');
    // }

    public function image()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
