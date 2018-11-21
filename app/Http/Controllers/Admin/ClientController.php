<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\View\View;
use App\Repos\ReviewRepo;

class ClientController extends Controller
{
    protected $repo;

    public function __construct(ReviewRepo $repo)
    {
        $this->repo = $repo;
    }
    /**
     * Dashboard Index
     *
     * @return View
     */
    public function index()
    {
        return view('admin.client.index', [
            'clients' => $this->repo->get(),
        ]);
    }

    /**
     * Add Review Page
     *
     * @return View
     */
    public function add()
    {
        return view('admin.client.add', [
            'client' => null,
        ]);
    }

    /**
     * Create Review
     *
     * @param Request $request
     *
     * @return Review
     */
    public function create(Request $request)
    {
        $params = $request->only([
            'title',
            'info',
        ]);

        $review = $this->repo->create($params);

        return redirect(route('admin.client.edit', [$review->id]));
    }

    /**
     * Edit Review Page
     *
     * @param int $id
     *
     * @return View
     */
    public function edit(int $id)
    {
        return view('admin.client.add', [
            'client' => $this->repo->find($id),
        ]);
    }

    public function update(Request $request, int $id)
    {
        $params = $request->only([
            'title',
            'info',
        ]);

        $this->repo->update($params, $id);

        return redirect(route('admin.client.edit', [$id]));
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
        $image = $request->file('review_image');

        $this->repo->upload($image, $id);

        return redirect(route('admin.client.edit', [$id]));
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

        return redirect(route('admin.client.edit', [$id]));
    }
}
