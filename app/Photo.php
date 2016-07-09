<?php

namespace App;

use Image;
use File;
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

    protected $file;

    protected static $baseDir = 'images/messages/photos';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($photo) {
           return $photo->upload();
        });
    }

    public function message()
    {
        return $this->belongsTo('Message');
    }

    public static function fromFile(UploadedFile $file)
    {
        $photo = new static;

        $photo->file = $file;

        return $photo->fill([
            'name' => $photo->fileName(),
            'path' => $photo->filePath(),
            'thumbnail_path' => $photo->thumbnailPath()
        ]);
    }

    public function fileName()
    {
        $name = sha1(time() . $this->file->getClientOriginalName());
        $extension = $this->file->getClientOriginalExtension();

        return $name . '.' . $extension;
    }

    public function filePath()
    {
        return static::$baseDir . '/' . $this->fileName();
    }

    public function thumbnailPath()
    {
        return static::$baseDir . '/tn-' . $this->fileName();
    }

    public function upload()
    {
        $this->file->move(static::$baseDir, $this->fileName());

        $this->makeThumbnail();

        return $this;
    }

    protected function makeThumbnail()
    {
        Image::make($this->filePath())->fit(200)->save($this->thumbnailPath());
    }

    public function delete()
    {
        File::delete($this->path);
        File::delete($this->thumbnail_path);
        parent::delete();
    }
}
