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


Route::get('/clear', ['as'=>'clear','uses'=>'IndexController@clear']);

// index routes
// index routes
Route::get('/', ['as'=>'index.index','uses'=>'IndexController@index']);
Route::get('/bio', ['as'=>'index.bio','uses'=>'IndexController@getBio']);
Route::get('/books', ['as'=>'index.books','uses'=>'IndexController@getBooks']);
Route::get('/multimedia', ['as'=>'index.multimedia','uses'=>'IndexController@getMultimedia']);
Route::get('/multimedia/{slug}', ['as'=>'index.multimedia.single','uses'=>'IndexController@getSingleMultimedia']);


Route::get('/gallery', ['as'=>'index.gallery','uses'=>'IndexController@getGallery']);
Route::get('/faq', ['as'=>'index.faq','uses'=>'IndexController@getFaq']);
Route::get('/contact', ['as'=>'index.contact','uses'=>'IndexController@getContact']);
Route::post('/contact/form/message/store', ['as'=>'index.storeformmessage','uses'=>'IndexController@storeFormMessage']);

Route::get('/search', ['as'=>'index.search','uses'=>'IndexController@getGSearch']);

// Route::get('/testdate', ['as'=>'index.testdate','uses'=>'IndexController@testDate']);

// index routes
// index routes

// blog routes
// blog routes
Route::resource('blogs','BlogController');
Route::get('blog/{slug}',['as' => 'blog.single', 'uses' => 'BlogController@getBlogPost']);
Route::get('blogger/profile/{unique_key}',['as' => 'blogger.profile', 'uses' => 'BlogController@getBloggerProfile']);
Route::get('/like/{user_id}/{blog_id}',['as' => 'blog.like', 'uses' => 'BlogController@likeBlogAPI']);
Route::get('/check/like/{user_id}/{blog_id}',['as' => 'blog.checklike', 'uses' => 'BlogController@checkLikeAPI']);
Route::get('/category/{name}',['as' => 'blog.categorywise', 'uses' => 'BlogController@getCategoryWise']);
Route::get('/archive/{date}',['as' => 'blog.monthwise', 'uses' => 'BlogController@getMonthWise']);
// blog routes
// blog routes

Route::auth();

// dashboard routes
// dashboard routes
Route::resource('users','UserController');
Route::get('/dashboard', ['as'=>'dashboard.index','uses'=>'DashboardController@index']);

Route::get('/dashboard/blogs', ['as'=>'dashboard.blogs','uses'=>'DashboardController@getBlogs']);
Route::get('/dashboard/blogs/create', ['as'=>'dashboard.blogs.create','uses'=>'DashboardController@createBlog']);
Route::post('/dashboard/blogs/store', ['as'=>'dashboard.blogs.store','uses'=>'DashboardController@storeBlog']);
Route::get('/dashboard/blogs/{id}/edit', ['as'=>'dashboard.blogs.edit','uses'=>'DashboardController@editBlog']);
Route::put('/dashboard/blogs/{id}/update', ['as'=>'dashboard.blogs.update','uses'=>'DashboardController@updateBlog']);
Route::delete('/dashboard/blogs/{id}/delete', ['as'=>'dashboard.blogs.delete','uses'=>'DashboardController@deleteBlog']);

Route::get('/dashboard/books', ['as'=>'dashboard.books','uses'=>'DashboardController@getBooks']);
Route::get('/dashboard/books/create', ['as'=>'dashboard.books.create','uses'=>'DashboardController@createBook']);
Route::post('/dashboard/books/store', ['as'=>'dashboard.books.store','uses'=>'DashboardController@storeBook']);
Route::get('/dashboard/books/{id}/edit', ['as'=>'dashboard.books.edit','uses'=>'DashboardController@editBook']);
Route::put('/dashboard/books/{id}/update', ['as'=>'dashboard.books.update','uses'=>'DashboardController@updateBook']);
Route::delete('/dashboard/books/{id}/delete', ['as'=>'dashboard.books.delete','uses'=>'DashboardController@deleteBook']);

Route::get('/dashboard/gallery', ['as'=>'dashboard.gallery','uses'=>'DashboardController@getGallery']);
Route::post('/dashboard/gallery/store', ['as'=>'dashboard.gallery.store','uses'=>'DashboardController@storeGallery']);
Route::put('/dashboard/gallery/{id}/update', ['as'=>'dashboard.gallery.update','uses'=>'DashboardController@updateGallery']);
Route::delete('/dashboard/gallery/{id}/delete', ['as'=>'dashboard.gallery.delete','uses'=>'DashboardController@deleteGallery']);

Route::get('/dashboard/multimedia', ['as'=>'dashboard.multimedia','uses'=>'DashboardController@getMultimedia']);
Route::get('/dashboard/multimedia/create', ['as'=>'dashboard.multimedia.create','uses'=>'DashboardController@createMultimedia']);
Route::post('/dashboard/multimedia/store', ['as'=>'dashboard.multimedia.store','uses'=>'DashboardController@storeMultimedia']);
Route::get('/dashboard/multimedia/{id}/edit', ['as'=>'dashboard.multimedia.edit','uses'=>'DashboardController@editMultimedia']);
Route::put('/dashboard/multimedia/{id}/update', ['as'=>'dashboard.multimedia.update','uses'=>'DashboardController@updateMultimedia']);
Route::delete('/dashboard/multimedia/{id}/delete', ['as'=>'dashboard.multimedia.delete','uses'=>'DashboardController@deleteMultimedia']);

Route::get('/dashboard/faq', ['as'=>'dashboard.faq','uses'=>'DashboardController@getFaq']);
Route::post('/dashboard/faq/store', ['as'=>'dashboard.faq.store','uses'=>'DashboardController@storeFaq']);
Route::put('/dashboard/faq/{id}/update', ['as'=>'dashboard.faq.update','uses'=>'DashboardController@updateFaq']);
Route::delete('/dashboard/faq/{id}/delete', ['as'=>'dashboard.faq.delete','uses'=>'DashboardController@deleteFaq']);

Route::get('/dashboard/messages', ['as'=>'dashboard.messages','uses'=>'DashboardController@getMessages']);
Route::delete('/dashboard/messages/{id}/delete', ['as'=>'dashboard.messages.delete','uses'=>'DashboardController@deleteMessage']);


// dashboard routes
// dashboard routes