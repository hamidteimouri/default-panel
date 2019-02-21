<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Rutorika\Sortable\SortableTrait;

class Article extends Model
{
    use SortableTrait;
    protected $fillable = [
        'category_id',
        'writer_id',
        'title',
        'summary',
        'description',
        'link',
        'source',
        'display',
        'position',
        'day',
        'month',
    ];

    public function category()
    {
        return $this->belongsTo(ArticleCategory::class);
    }


    // code below is for attachments
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($object) {
            $object->attachments()->get()->each(function ($attachment) {
                $attachment->delete();
            });
        });
    }

    public function attachments()
    {
        return $this->morphMany(Attachment::class, 'attachmentable');
    }


}
