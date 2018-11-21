<?php

namespace App\Repos;

use App\Models\Settings;
use Illuminate\Contracts\Filesystem\Factory as Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class SettingsRepo
{
    protected $settings;
    protected $storage;

    public function __construct(Settings $settings, Storage $storage)
    {
        $this->settings = $settings;
        $this->storage  = $storage;
    }

    /**
     * Find Settings
     *
     * @param int $id
     *
     * @return Settings
     */
    public function find(int $id)
    {
        return $this->settings->findOrFail($id);
    }

    /**
     * Find Settings by Title
     *
     * @param string $title
     *
     * @return Settings
     */
    public function findByTitle(string $title)
    {
        return $this->settings->where('key', $title)->firstOrFail();
    }

    /**
     * Get all Settings
     *
     * @return Collection
     */
    public function get()
    {
        return $this->settings->get();
    }

    /**
     * Create Settings
     *
     * @param array $params
     *
     * @return Settings
     */
    public function create(array $params)
    {
        return $this->settings->create($params);
    }

    /**
     * Update Settings
     *
     * @param array $params
     * @param int $id
     *
     * @return null
     */
    public function update(array $params, int $id)
    {
        $this->settings->findOrFail($id)->update($params);
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
        $path=$_FILES["settings_image"]["tmp_name"];
        $this->storage->disk('uploads')->put($name, file_get_contents($path));

        $this->settings->findOrFail($id)->update(['image' => '/gallery/' . $name]);
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
        $this->settings->findOrFail($id)->update(['image' => null]);
    }

    /**
     * Delete news
     *
     *
     *
     */
    public function delete(int $id){
        $this->settings->findOrFail($id)->delete();
    }
}
