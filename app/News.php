<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Rutorika\Sortable\SortableTrait;

class News extends Model
{
    use SortableTrait;
    protected $fillable = [
        'title',
        'category_id',
        'writer_id',
        'source',
        'link',
        'summary',
        'description',
        'position',
        'display',
    ];

    public function category()
    {
        return $this->belongsTo(NewsCategory::class);
    }

    /*
    public function getTitleForUrlAttribute()
    {
        return removeSpecialCharacter($this->title);
    }
    */


    public function getCreatedAtInPersianAttribute()
    {
        return \Morilog\Jalali\jDate::forge($this->created_at)->format('d F Y');
    }

    public function getCreatedAtInPersianNumberAttribute()
    {
        return \Morilog\Jalali\jDate::forge($this->created_at)->format('Y/m/d');
    }

    public function getDayAttribute()
    {
        return \Morilog\Jalali\jDate::forge($this->created_at)->format('d');
    }

    public function getMonthAttribute()
    {
        return \Morilog\Jalali\jDate::forge($this->created_at)->format('F');
    }

    public function getYearAttribute()
    {
        return \Morilog\Jalali\jDate::forge($this->created_at)->format('Y');
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
