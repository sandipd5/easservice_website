<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'gallery';

    protected $fillable = [
        'title',
        'content',
        'btn_text',
        'btn_link',
        'type',
    ];

    /**
     * @return HasMany
     */
    public function contents()
    {
        return $this->hasMany(GalleryContent::class, 'gallery_id', 'id');
    }
}
