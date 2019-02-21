<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Rutorika\Sortable\SortableTrait;

class ArticleCategory extends Model
{
    use SortableTrait;

    protected $fillable = [
        'title'
    ];

    public function articles()
    {
        return $this->hasMany(Article::class, 'category_id');
    }

    public function getCreatedAtInPersianAttribute()
    {
        return \Morilog\Jalali\jDate::forge($this->created_at)->format('d F Y');
    }
}
