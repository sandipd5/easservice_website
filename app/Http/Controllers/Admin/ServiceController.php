<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\View\View;
use App\Repos\ServiceRepo;

class ServiceController extends Controller
{
    protected $repo;

    public function __construct(ServiceRepo $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Services
     *
     * @return View
     */
    public function index()
    {
        return view('admin.service.index', [
            'services' => $this->repo->get(),
        ]);
    }

    /**
     * Add New Service
     *
     * @return View
     */
    public function add()
    {
        return view('admin.service.add', [
            'service' => null,
        ]);
    }

    /**
     * Create Service
     *
     * @param Request $request
     *
     * @return Redirect
     */
    public function create(Request $request)
    {
        $params = $request->only([
            'title',
            'info',
            'description',
            'icon',
        ]);

        $service = $this->repo->create($params);

        return redirect(route('admin.service.edit', [$service->id]));
    }

    /**
     * Edit page
     *
     * @param int $id
     *
     * @return View
     */
    public function edit(int $id)
    {
        return view('admin.service.add', [
            'service' => $this->repo->find($id),
        ]);
    }

    /**
     * Update Servicec
     *
     * @param Request $request
     * @param int $id
     *
     * @return Redirect
     */
    public function update(Request $request, int $id)
    {
        $params = $request->only([
            'title',
            'info',
            'description',
            'icon',
        ]);

        $this->repo->update($params, $id);

        return redirect(route('admin.service.edit', [$id]));
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
        $image = $request->file('service_image');

        $this->repo->upload($image, $id);

        return redirect(route('admin.service.edit', [$id]));
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

        return redirect(route('admin.service.edit', [$id]));
    }
    /**
     * Delete news
     *
     *
     */
    public function delete(int $id){
        $this->repo->delete($id);  

        return redirect(route('admin.service.index'));
    }
}
