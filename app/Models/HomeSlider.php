<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HomeSlider extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $with = ['languages'];

    public function languages()
    {
        return $this->hasMany(HomeSliderLanguage::class);
    }
}
