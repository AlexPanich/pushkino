<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'name',
        'user_id',
        'type',
        'price',
        'description',
    ];

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function addPhoto(Photo $photo)
    {
        return $this->photos()->save($photo);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeFresh($query)
    {
        return $query->where('updated_at', '>=', Carbon::yesterday()->toDateTimeString());
    }

    public function delete()
    {
        foreach ($this->photos as $photo) {
            $photo->delete();
        }
        parent::delete();
    }
}
