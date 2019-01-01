<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Picture extends Model
{

    const PATH_PREFIX = 'public/images/';  

    //
 
    public function create($file)
    {
        
    }

    public function getUrl($type = 'src')
    {
        return Storage::url(self::PATH_PREFIX . $type . '/' . $this->path);
    }
}
