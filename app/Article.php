<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'body',
        'published_at'
    ];

    protected $dates = ['published_at'];

    public function setPublishedAtAttribute($date)
    {
        $this->attributes['published_at'] = Carbon::parse($date);
    }

    public function getPublishedAtAttribute($date)
    {
        return Carbon::parse($date)->format('Y-m-d');
    }

    public function scopePublished($query)
    {
        $query->where('published_at', '<=', Carbon::now());
    }

    public function scopeUnpublished($query)
    {
        $query->where('published_at', '>', Carbon::now());
    }

    public function user() {
        return $this->belongsTo(Article::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function getTagListAttribute()
    {
        return $this->tags->lists('id')->toArray();
    }

    public function scopeFresh($query)
    {
        return $query->where('published_at', '>=', Carbon::yesterday()->toDateTimeString())
            ->orderBy('updated_at', 'desc')
            ->limit(4);
    }

    public function getPreviewAttribute()
    {
        return mb_substr($this->body, 0, 100) . '...';
    }
}
