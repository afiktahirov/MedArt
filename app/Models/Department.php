<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $with = ['doctors'];

    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }
}
