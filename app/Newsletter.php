<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Rutorika\Sortable\SortableTrait;

class Newsletter extends Model
{
    use SortableTrait, GeneralTrait;
    protected $fillable = [
        'position',
        'display',
    ];

}
