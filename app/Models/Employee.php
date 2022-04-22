<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Employee extends Model
{
    use HasFactory, HasRoles;

    // public function position()
    // {
    //     return $this->belongsTo(Position::class);
    // }
    
    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function hobi()
    {
        return $this->belongsToMany(Hobby::class);
    }

    public function image()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
