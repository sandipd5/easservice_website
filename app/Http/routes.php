<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::resource('notices', 'NoticeController');

Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'as' => 'admin.', 'namespace' => 'Admin'], function() {
    Route::get('/', 'DashboardController@index')->name('index');
    

    Route::group(['prefix' => 'gallery', 'as' => 'gallery.'], function() {
        Route::get('/', 'GalleryController@index')->name('index');
        Route::get('/add', 'GalleryController@add')->name('add');
        Route::post('/create', 'GalleryController@create')->name('create');
        Route::get('/edit/{id}', 'GalleryController@edit')->name('edit');
        Route::post('/update/{id}', 'GalleryController@update')->name('update');
        Route::delete('/delete/{id}', 'GalleryController@delete')->name('delete');

        Route::post('/upload/{id}', 'GalleryController@upload')->name('upload');
        Route::get('/delete-upload/{galleryId}/{uploadId}', 'GalleryController@deleteUpload')->name('delete-upload');
    });

    Route::group(['prefix' => 'service', 'as' => 'service.'], function() {
        Route::get('/', 'ServiceController@index')->name('index');
        Route::get('/add', 'ServiceController@add')->name('add');
        Route::post('/create', 'ServiceController@create')->name('create');
        Route::get('/edit/{id}', 'ServiceController@edit')->name('edit');
        Route::post('/update/{id}', 'ServiceController@update')->name('update');
        Route::delete('/delete/{id}', 'ServiceController@delete')->name('delete');

        Route::post('/upload/{id}', 'ServiceController@upload')->name('upload');
        Route::get('/delete-upload/{galleryId}', 'ServiceController@deleteUpload')->name('delete-upload');
    });

    
       
      
    Route::group(['prefix' => 'client', 'as' => 'client.'], function() {
        Route::get('/', 'ClientController@index')->name('index');
        Route::get('/add', 'ClientController@add')->name('add');
        Route::post('/create', 'ClientController@create')->name('create');
        Route::get('/edit/{id}', 'ClientController@edit')->name('edit');
        Route::post('/update/{id}', 'ClientController@update')->name('update');
        Route::delete('/delete/{id}', 'ClientController@delete')->name('delete');

        Route::post('/upload/{id}', 'ClientController@upload')->name('upload');
        Route::get('/delete-upload/{galleryId}', 'ClientController@deleteUpload')->name('delete-upload');
    });

    Route::group(['prefix' => 'news', 'as' => 'news.'], function() {
        Route::get('/', 'NewsController@index')->name('index');
        Route::get('/add', 'NewsController@add')->name('add');
        Route::post('/create', 'NewsController@create')->name('create');
        Route::get('/edit/{id}', 'NewsController@edit')->name('edit');
        Route::post('/update/{id}', 'NewsController@update')->name('update');
        Route::delete('/delete/{id}', 'NewsController@delete')->name('delete');

        Route::post('/upload/{id}', 'NewsController@upload')->name('upload');
        Route::get('/delete-upload/{galleryId}', 'NewsController@deleteUpload')->name('delete-upload');
    });

    Route::group(['prefix' => 'settings', 'as' => 'settings.'], function() {
        Route::get('/', 'SettingsController@index')->name('index');
        Route::get('/add', 'SettingsController@add')->name('add');
        Route::post('/create', 'SettingsController@create')->name('create');
        Route::get('/edit/{id}', 'SettingsController@edit')->name('edit');
        Route::post('/update/{id}', 'SettingsController@update')->name('update');
        Route::delete('/delete/{id}', 'SettingsController@delete')->name('delete');

        Route::post('/upload/{id}', 'SettingsController@upload')->name('upload');
        Route::get('/delete-upload/{galleryId}', 'SettingsController@deleteUpload')->name('delete-upload');
    });
});

Route::get('/', 'HomeController@index')->name('home-page');
Route::get('services', 'HomeController@services')->name('all-services');
Route::get('services/{id}', 'HomeController@serviceDetail')->name('service-details');
Route::get('news', 'HomeController@news')->name('all-news');
Route::get('news/{id}', 'HomeController@newsDetail')->name('news-details');
Route::get('contact', 'HomeController@contact')->name('contact-page');
Route::post('send-email', 'HomeController@sendEmail')->name('send-email');
Route::get('{setting}', 'HomeController@settingPage')->name('setting-page');
