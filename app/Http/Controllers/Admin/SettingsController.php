<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\View\View;
use App\Repos\SettingsRepo;

class SettingsController extends Controller
{
    protected $repo;

    public function __construct(SettingsRepo $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Index Page
     *
     * @return View
     */
    public function index()
    {
        return view('admin.settings.index', [
            'settings' => $this->repo->get(),
        ]);
    }

    /**
     * Add Settings
     *
     * @return View
     */
    public function add()
    {
        return view('admin.settings.add', [
            'settings' => null,
        ]);
    }

    /**
     * Create Settings
     *
     * @param Request $request
     *
     * @return Redirect
     */
    public function create(Request $request)
    {
        $params = $request->only([
            'key',
            'value',
        ]);

        $settings = $this->repo->create($params);

        return redirect(route('admin.settings.edit', [$settings->id]));
    }

    /**
     * Edit Settings
     *
     * @param int $id
     *
     * @return View
     */
    public function edit(int $id)
    {
        return view('admin.settings.add', [
            'settings' => $this->repo->find($id),
        ]);
    }

    /**
     * Update Settings
     *
     * @param Request $request
     * @param int id
     *
     * @return Redirect
     */
    public function update(Request $request, int $id)
    {
        $params = $request->only([
            'key',
            'value',
        ]);

        $this->repo->update($params, $id);

        return redirect(route('admin.settings.edit', [$id]));
    }

    /**
     * Upload Image
     *
     * @param Request $request
     *
     * @return Redirect
     */
    public function upload(Request $request, int $id)
    {
        $image = $request->file('settings_image');

        $this->repo->upload($image, $id);

        return redirect(route('admin.settings.edit', [$id]));
    }

    /**
     * Delete Image
     *
     * @param  int $id
     *
     * @return Redirect
     */
    public function deleteUpload(int $id)
    {
        $this->repo->deleteImage($id);

        return redirect(route('admin.settings.edit', [$id]));
    }

    public function delete(int $id){
        $this->repo->delete($id);  

        return redirect(route('admin.settings.index'));
    }
}
