<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\View\View;
use App\Repos\NewsRepo;

class NewsController extends Controller
{
    protected $repo;

    public function __construct(NewsRepo $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Listing Page
     *
     * @return View
     */
    public function index()
    {
        return view('admin.news.index', [
            'allNews' => $this->repo->get(),
        ]);
    }

    /**
     * Add News
     *
     * @return View
     */
    public function add()
    {
        return view('admin.news.add', [
            'news' => null,
        ]);
    }

    /**
     * Create News
     *
     * @param Request $request
     *
     * @return Redirect
     */
    public function create(Request $request)
    {
        $params = $request->only([
            'title',
            'date',
            'author',
            'description',
        ]);

        $news = $this->repo->create($params);

        return redirect(route('admin.news.edit', [$news->id]));
    }

    /**
     * Edit News
     *
     * @param int $id
     *
     * @return View
     */
    public function edit(int $id)
    {
        return view('admin.news.add', [
            'news' => $this->repo->find($id),
        ]);
    }

    public function update(Request $request, int $id)
    {
        $params = $request->only([
            'title',
            'date',
            'author',
            'description',
        ]);

        $this->repo->update($params, $id);

        return redirect(route('admin.news.edit', [$id]));
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
        $image = $request->file('news_image');

        $this->repo->upload($image, $id);

        return redirect(route('admin.news.edit', [$id]));
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

        return redirect(route('admin.news.edit', [$id]));
    }

    /**
     * Delete news
     *
     *
     */
    public function delete(int $id){
        $this->repo->delete($id);  

        return redirect(route('admin.news.index'));
    }
}
