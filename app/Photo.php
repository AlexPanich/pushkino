<?php

namespace App;

use Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;


class Photo extends Model
{
    protected $table = 'messages_photos';

    protected $fillable = [
        'path',
        'name',
        'thumbnail_path'
    ];

    protected static $baseDir = 'images/messages/photos';

    public function message()
    {
        return $this->belongsTo('Message');
    }

    public static function named($name)
    {
        return (new static)->saveAs($name);
    }

    protected function saveAs($name)
    {
        $this->name = sprintf('%s-%s', time(), $name);
        $this->path = sprintf('%s/%s', static::$baseDir, $this->name);
        $this->thumbnail_path = sprintf('%s/tn-%s', static::$baseDir, $this->name);

        return $this;
    }

    public function move(UploadedFile $file)
    {
        $file->move(static::$baseDir, $this->name);

        $this->makeThumbnail();

        return $this;
    }

    protected function makeThumbnail()
    {
        Image::make($this->path)->fit(200)->save($this->thumbnail_path);
    }

    public function delete()
    {
        unlink($this->path);
        unlink($this->thumbnail_path);
        parent::delete();
    }
}
