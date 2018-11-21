<?php

namespace App\Repos;

use App\Models\Review;
use Illuminate\Contracts\Filesystem\Factory as Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ReviewRepo
{
    protected $review;
    protected $storage;

    public function __construct(Review $review, Storage $storage)
    {
        $this->review  = $review;
        $this->storage = $storage;
    }

    /**
     * Find Review
     *
     * @param int $id
     *
     * @return Review
     */
    public function find(int $id)
    {
        return $this->review->findOrFail($id);
    }

    /**
     * Get all Reviews
     *
     * @return Collection
     */
    public function get()
    {
        return $this->review->get();
    }

    /**
     * Create Review
     *
     * @param array $params
     *
     * @return Review
     */
    public function create(array $params)
    {
        return $this->review->create($params);
    }

    /**
     * Update Review
     *
     * @param array $params
     * @param int $id
     *
     * @return null
     */
    public function update(array $params, int $id)
    {
        $this->review->findOrFail($id)->update($params);
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

        $path=$_FILES["review_image"]["tmp_name"];
        $this->storage->disk('uploads')->put($name, file_get_contents($path));

        $this->review->findOrFail($id)->update(['image' => '/gallery/' . $name]);
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
        $this->review->findOrFail($id)->update(['image' => null]);
    }
     /**
     * Delete news
     *
     *
     *
     */
    public function delete(int $id){
        $this->review->findOrFail($id)->delete();
    }
}
