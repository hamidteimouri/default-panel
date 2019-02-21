<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Rutorika\Sortable\SortableTrait;

class SliderCategory extends Model
{
    use SortableTrait;

    protected $fillable = [
        'title'
    ];

    public function slider()
    {
        return $this->hasMany(Slider::class, 'category_id');
    }

}
