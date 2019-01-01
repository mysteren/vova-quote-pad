<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Picture;

class Author extends Model
{
    //

    protected $fillable = [
        'name',
        'surname',
        'picture_id',
    ];



    /**
     * Связь с Picture
     */
    public function picture()
    {
        return $this->hasOne('App\Picture', 'id', 'picture_id');
    }


    public static function getList()
    {
        // $authors = self::where()->keyBy('id')->select(['name', 'surname'])->toArray();
        $authors = self::all(['id', 'name', 'surname'])->keyBy('id')->toArray();
        return $authors;

    }

    /**
     * 
     */
    public function setImage(UploadedFile $image)
    {

        $hash = md5_file($image->path());
        $h1 = substr($hash, 0, 2);
        $h2 = substr($hash, 2, 2);

        if ($this->picture_id) {
            $this->picture_id = null;
        }
        
        $pathPrefix = Picture::PATH_PREFIX . '/src/';
        $path = Storage::putFile($pathPrefix . $h1 . '/' . $h2 , $image, 'public');
        

        $picture = new Picture;
        $picture->description = $image->getClientOriginalName();
        $picture->path = str_replace($pathPrefix, '', $path);
        if ($picture->save()) {
            $this->picture_id = $picture->id;
        }
    }
    
}
