<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class department_icon extends Model
{
    use HasFactory;
    protected $with = ["languages"];

    public function languages(){
        return $this->hasMany(Department::class);
    }

}
