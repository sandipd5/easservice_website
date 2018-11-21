<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\View\View;
use App\Repos\GalleryRepo;

class GalleryController extends Controller
{
    protected $repo;

    public function __construct(GalleryRepo $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Gallery Listing page
     *
     * @return View
     */
    public function index()
    {
        return view('admin.gallery.index', [
            'galleries' => $this->repo->get(),
        ]);
    }

    /**
     * Show Add Form
     *
     * @return View
     */
    public function add()
    {
        return view('admin.gallery.add', [
            'gallery' => null
        ]);
    }

    /**
     * Create Gallery
     *
     * @param Request $request
     *
     * @return Redirect
     */
    public function create(Request $request)
    {
        $params = $request->only([
            'title',
            'content',
            'btn_text',
            'btn_link',
            'type',
        ]);

        $gallery = $this->repo->create($params);

        return redirect(route('admin.gallery.edit', [$gallery->id]));
    }

    /**
     * Edit Gallery
     *
     * @param int $id
     *
     * @return View
     */
    public function edit(int $id)
    {
        $gallery = $this->repo->find($id);

        return view('admin.gallery.add', [
            'gallery' => $gallery,
        ]);
    }

    /**
     * Update Gallery
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
            'content',
            'btn_text',
            'btn_link',
            'type',
        ]);

        $this->repo->update($params, $id);

        return redirect(route('admin.gallery.edit', [$id]));
    }

    /**
     * Upload Gallery Content
     *
     * @param Request $request
     * @param int $id
     *
     * @return Redirect
     */
    public function upload(Request $request, int $id)
    {
        $file = $request->file('gallery_upload');
        $this->repo->uploadAndUpdate($file, $id);

        return redirect(route('admin.gallery.edit', [$id]));
    }

    /**
     * Delete Upload
     *
     * @param int $galleryId
     * @param int $contentId
     *
     * @return Redirect
     */
    public function deleteUpload(int $galleryId, int $contentId)
    {
        $this->repo->deleteContent($contentId);

        return redirect(route('admin.gallery.edit', [$galleryId]));
    }
    /**
     * Delete gallery
     *
     *
     */
    public function delete(int $id){
        $this->repo->delete($id);  

        return redirect(route('admin.gallery.index'));
    }
}
