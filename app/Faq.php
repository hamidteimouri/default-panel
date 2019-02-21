<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Rutorika\Sortable\SortableTrait;


class Faq extends Model
{
    use SortableTrait;

    protected $table = 'faqs';
    protected $fillable = [
        'title',
        'category_id',
        'question',
        'answer',
        'display',
        'position',
    ];
}
