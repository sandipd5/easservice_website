<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Notice;
use Illuminate\View\View;
use App\Repos\GalleryRepo;
use App\Repos\ServiceRepo;
use App\Repos\ReviewRepo;
use App\Repos\NewsRepo;
use App\Repos\SettingsRepo;
use App\Validators\ContactValidator;
use Illuminate\Mail\Mailer;

class HomeController extends Controller
{
    protected $gallery;
    protected $service;
    protected $review;
    protected $news;
    protected $validator;
    protected $mailer;
    protected $notice;

    public function __construct(
        GalleryRepo $gallery,
        ServiceRepo $service,
        ReviewRepo $review,
        NewsRepo $news,
        SettingsRepo $settings,
        ContactValidator $validator,
        Mailer $mailer,
        Notice $notice
    ) {

        $this->gallery   = $gallery;
        $this->service   = $service;
        $this->review    = $review;
        $this->news      = $news;
        $this->settings  = $settings;
        $this->validator = $validator;
        $this->mailer    = $mailer;
        $this->notice    =$notice;
        
    }

    /**
     * Index page
     *
     * @param  Request $request
     *
     * @return View
     */
    public function index(Request $request)
    {
        $galleries = $this->gallery->fetch(2);
        $services  = $this->service->get();
        $reviews   = $this->review->get();
      //  $notice    = $this->notice->get();
     //   $notice =    Notice::all();
        $notice = Notice::get();
       


        return view('site.index', [
            'galleries' => $galleries,
            'services' => $services,
            'reviews' => $reviews,
            'content' => $this->settings->findByTitle('about'),
            'notice' => $notice,
        ]);
    }

    /**
     * All Service Page
     *
     * @return View
     */
    public function services()
    {
        return view('site.services', [
            'services' => $this->service->get(),
        ]);
    }

    /**
     * Service Details Page
     *
     * @param int $id
     *
     * @return View
     */
    public function serviceDetail(int $id)
    {
        $services  = $this->service->get();
        return view('site.service-detail', [
            'service' => $this->service->find($id),
            'services' => $services,
        ]);
    }

    /**
     * News Listing Page
     *
     * @return View
     */
    public function news()
    {
        $services  = $this->service->get();
        return view('site.news', [
            'allNews' => $this->news->get(),
            'services' => $services,

        ]);
    }

    /**
     * News Details Page
     *
     * @param int $id
     *
     * @return View
     */
    public function newsDetail(int $id)
    {
        $services  = $this->service->get();
        return view('site.news-details', [
            'news' => $this->news->find($id),
            'allNews' => $this->news->get(),
            'services' => $services,
        ]);
    }

    /**
     * Contact Page
     *
     * @return View
     */
    public function contact()
    {
        $services  = $this->service->get();
        return view('site.contact-page',[
        'services' => $services,
    
    ]);
    }

    /**
     * Setting Page
     *
     * @param string $slug
     *
     * @return View
     */
    public function settingPage(string $slug)
    {
        $services  = $this->service->get();
        return view('site.setting-page', [
            'content' => $this->settings->findByTitle($slug),
            'services' => $services,
        ]);
    }

    public function sendEmail(Request $request)
    {
        $params = $request->only([
            'name',
            'phone',
            'email',
            'details',
        ]);

        $this->validator->validate($params);

        $this->mailer->send('site.email', $params, function ($m) use ($params) {
            $m->from($params['email'], $params['name']);
            $m->to('info@easy.com.np', 'Easy Services');
        });
    }
}
