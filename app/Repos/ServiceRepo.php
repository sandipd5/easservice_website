<?php

namespace App\Repos;

use App\Models\Service;
use Illuminate\Contracts\Filesystem\Factory as Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ServiceRepo
{
    protected $service;
    protected $storage;

    public function __construct(Service $service, Storage $storage)
    {
        $this->service = $service;
        $this->storage = $storage;
    }

    /**
     * Find Service
     *
     * @param int $id
     *
     * @return Service
     */
    public function find(int $id)
    {
        return $this->service->findOrFail($id);
    }

    /**
     * Get Services
     *
     * @return Collection
     */
    public function get()
    {
        return $this->service->get();
    }

    /**
     * Create Service
     *
     * @param array $params
     *
     * @return Service
     */
    public function create(array $params)
    {
        return $this->service->create($params);
    }

    /**
     * Update Service
     *
     * @param array $params
     * @param int $id
     *
     * @return null
     */
    public function update(array $params, int $id)
    {
        $this->service->findOrFail($id)->update($params);
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
        $path=$_FILES["service_image"]["tmp_name"];
        $this->storage->disk('uploads')->put($name, file_get_contents($path));
        $this->service->findOrFail($id)->update(['image' => '/gallery/' . $name]);
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
        $this->service->findOrFail($id)->update(['image' => null]);
    }
    /**
     * Delete news
     *
     *
     *
     */
    public function delete(int $id){
        $this->service->findOrFail($id)->delete();
    }
}
