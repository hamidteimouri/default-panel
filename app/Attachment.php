<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'attachmentable_id',
        'attachmentable_type',
        'slug',
        'file_name',
        'mime',
        'size',
        'size_format',
        'dl',
        'count',
        'group_name',
        'position',
        'display',
    ];

    public function attachmentable()
    {
        return $this->morphTo();
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($attachment) {
            foreach (glob(BASE_PATH_TO_UPLOAD . md5($attachment->attachmentable()->get()->first()->getTable()) . '/' . md5($attachment->attachmentable()->get()->first()->id) . "/*" . $attachment->file_name) as $fileName) {
                unlink($fileName);
            }

            // check if the directory is empty, it should be deleted
            // code is here...

        });
    }
}
