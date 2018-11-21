<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryContent extends Model
{
    protected $table = 'gallery_content';

    protected $fillable = [
        'gallery_id',
        'source',
    ];

    /*
    	Defining belongs to relation with Gallery
    */
    public function content_list(){
    	return $this->belongsTo(Gallery::class);
    }
}
