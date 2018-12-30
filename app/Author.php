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
        
        $path = Storage::putFile('public/images/' . $h1 . '/' . $h2 , $image, 'public');
        //$url = Storage::url($path);

        $picture = new Picture;
        $picture->description = $image->getClientOriginalName();
        $picture->path = $path;
        if ($picture->save()) {
            $this->picture_id = $picture->id;
        }
    }


    /**
     * Связь с Picture
     */
    public function picture()
    {
        return $this->hasOne('App\Picture', 'id', 'picture_id');
    }

}
