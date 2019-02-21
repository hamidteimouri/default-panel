<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Rutorika\Sortable\SortableTrait;

class About extends Model
{
    use SortableTrait;
    protected $fillable = [
        'title',
        'description',
        'summary',
        'slogan',
        'position',
        'display',
    ];
}
