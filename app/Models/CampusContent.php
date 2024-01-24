<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampusContent extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address'];

    public function phones()
    {
        return $this->hasMany(Phone::class,'campus_id');
    }
}
