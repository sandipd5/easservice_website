<?php

namespace App\Repos;

use App\Models\Gallery;
use App\Models\GalleryContent;
use Illuminate\Contracts\Filesystem\Factory as Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class GalleryRepo
{
    protected $gallery;
    protected $storage;
    protected $content;

    public function __construct(Gallery $gallery, Storage $storage, GalleryContent $content)
    {
        $this->gallery = $gallery;
        $this->storage = $storage;
        $this->content = $content;
    }

    /**
     * Find Gallery
     *
     * @param int $id
     *
     * @return Gallery
     */
    public function find(int $id)
    {
        return $this->gallery->findOrFail($id);
    }

    /**
     * Get all Gallery Items
     *
     * @return Collection
     */
    public function get()
    {
        return $this->gallery->orderBy('created_at')->get();
    }

    /**
     * Fetch number of gallery items
     *
     * @param int $number
     *
     * @return Collection
     */
      public function fetch(int $number)
    {
        return $this->gallery->orderBy('created_at')->limit($number)->get();
    }

    /**
     * Create Gallery
     *
     * @param array $params
     *
     * @return Gallery
     */
    public function create(array $params)
    {
        return $this->gallery->create($params);
    }

    /**
     * Update Gallery
     *
     * @param array $params
     * @param int $id
     *
     * @return null
     */
    public function update(array $params, int $id)
    {
        $this->gallery->findOrFail($id)->update($params);
    }

    /**
     * Upload Gallery File
     *
     * @param UploadedFile $file
     * @param int $id
     *
     * @return null
     */
    public function uploadAndUpdate(UploadedFile $file, int $id)
    {
        $name = md5($file->getClientOriginalName() . microtime()) . '.' . $file->getClientOriginalExtension();
        $path=$_FILES["gallery_upload"]["tmp_name"];
        $this->storage->disk('uploads')->put($name, file_get_contents($path));

        $this->content->create([
            'gallery_id' => $id,
            'source' => '/gallery/' . $name
        ]);
    }

    /**
     * Delete Content
     *
     * @param int $contentId
     *
     * @return null
     */
    public function deleteContent(int $contentId)
    {
        $this->content->destroy($contentId);
    }
    /**
     * Delete news
     *
     *
     *
     */
    public function delete(int $id){
        $this->gallery->findOrFail($id)->delete();
    }
}
