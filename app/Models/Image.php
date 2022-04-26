<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $guarded = [];

    public function imageable()
    {
        return $this->morphTo();
    }

    public function hobby()
    {
        return $this->morphedByMany(Hobby::class, 'imageable');
    }

    // public function employees()
    // {
    //     return $this->morphedByMany(Employee::class, 'image');
    // }
}
