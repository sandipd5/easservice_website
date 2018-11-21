<?php

namespace App\Repos;

use App\Models\News;
use Illuminate\Contracts\Filesystem\Factory as Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class NewsRepo
{
    protected $news;
    protected $storage;

    public function __construct(News $news, Storage $storage)
    {
        $this->news    = $news;
        $this->storage = $storage;
    }

    /**
     * Find News
     *
     * @param int $id
     *
     * @return News
     */
    public function find(int $id)
    {
        return $this->news->findOrFail($id);
    }

    /**
     * Get all News
     *
     * @return Collection
     */
    public function get()
    {
        return $this->news->orderBy('date','desc')->get();
    }
    public function last()
    {
        return $this->news->orderBy('id','desc')->first();
    }

    /**
     * Create News
     *
     * @param array $params
     *
     * @return News
     */
    public function create(array $params)
    {
        return $this->news->create($params);
    }

    /**
     * Update News
     *
     * @param array $params
     * @param int $id
     *
     * @return null
     */
    public function update(array $params, int $id)
    {
        $this->news->findOrFail($id)->update($params);
    }

    /**
     * Upload Image
     *
     * @param UploadedFile $file
     * @param int $id
     *
     * @return null
     */
    public function upload(UploadedFile $file, int $id)
    {
        $name = md5($file->getClientOriginalName() . microtime()) . '.' . $file->getClientOriginalExtension();

         $path=$_FILES["news_image"]["tmp_name"];
        $this->storage->disk('uploads')->put($name, file_get_contents($path));
        
        $this->news->findOrFail($id)->update(['image' => '/gallery/' . $name]);
    }

    /**
     * Delete Image
     *
     * @param int $id
     *
     * @return null
     */
    public function deleteImage(int $id)
    {
        $this->news->findOrFail($id)->update(['image' => null]);
    }

    /**
     * Delete news
     *
     *
     *
     */
    public function delete(int $id){
        $this->news->findOrFail($id)->delete();
    }
}
