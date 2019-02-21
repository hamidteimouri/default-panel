<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Rutorika\Sortable\SortableTrait;

class Slider extends Model
{
    use SortableTrait, GeneralTrait;
    protected $fillable = [
        'title',
        'description',
        'link',
        'position',
        'display',
    ];


    public function category()
    {
        return $this->belongsTo(SliderCategory::class, 'category_id');
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
