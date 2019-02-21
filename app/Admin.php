<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use Notifiable, HasRoles;

    protected $fillable = [
        'name', 'family', 'email', 'password'
    ];

    public function getFullNameAttribute()
    {
        return $this->name . ' ' . $this->family;
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = \Hash::make($value);
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
