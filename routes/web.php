<?php
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Route;
    Route::get('/', function (){
        return view('main');
    })->name('main');

    //Basic posts routes
    Route::get('/home', 'HomeController@index')->name('home');
    Route::group(['namespace' => 'Post'], function() {
        Route::get('/posts', 'IndexController')->name('post.index');
        Route::get('/posts/{post}', 'ShowController')->name('post.show');
    });
    //Admin posts routes
    Route::group(['namespace' => 'Admin', 'prefix' =>'admin', 'middleware' => 'admin'], function() {
        Route::group(['namespace' => 'Post'], function() {
            Route::get('/post', 'IndexController')->name('admin.post.index');
            Route::get('/posts/create', 'CreateController')->name('admin.post.create');
            Route::post('/posts', 'StoreController')->name('admin.post.store');
            Route::get('/posts/{post}', 'ShowController')->name('admin.post.show');
            Route::get('/posts/{post}/edit', 'EditController')->name('admin.post.edit');
            Route::patch('/posts/{post}', 'UpdateController')->name('admin.post.update');
            Route::delete('/posts/{post}', 'DestroyController')->name('admin.post.delete'); 
        });
    });
    //Admin Kurator routes
    Route::group(['namespace' => 'Admin', 'prefix' =>'admin', 'middleware' => 'admin'], function() {
        Route::group(['namespace' => 'Kurator'], function() {
            Route::get('/kurator', 'IndexController')->name('admin.kurator.index');
            Route::get('/kurators/create', 'CreateController')->name('admin.kurator.create');
            Route::post('/kurators', 'StoreController')->name('admin.kurator.store');
            Route::get('/kurators/{kurator}', 'ShowController')->name('admin.kurator.show');
            Route::get('/kurators/{kurator}/edit', 'EditController')->name('admin.kurator.edit');
            Route::patch('/kurators/{kurator}', 'UpdateController')->name('admin.kurator.update');
            Route::delete('/kurators/{kurator}', 'DestroyController')->name('admin.kurator.delete'); 
        });
    });
    //Admin Report routes
    Route::group(['namespace' => 'Admin', 'prefix' =>'admin', 'middleware' => 'admin'], function() {
        Route::group(['namespace' => 'Report'], function() {
            Route::get('/report', 'IndexController')->name('admin.report.index');


            Route::get('/reports/{kurator}', 'ShowController')->name('admin.report.show');
            Route::post('/reports/{kurator}/generate-pdf', 'PdfController')->name('admin.report.pdf');
        });
    });
     //Admin Feedback routes
    Route::group(['namespace' => 'Admin', 'prefix' =>'admin', 'middleware' => 'admin'], function() {
        Route::group(['namespace' => 'Feedback'], function() {
            Route::get('/feedback', 'IndexController')->name('admin.feedback.index');
            Route::get('/feedbacks/create', 'CreateController@main')->name('admin.feedback.create');
            Route::post('/feedbacks', 'StoreController@main')->name('admin.feedback.store');
            Route::get('/feedbacks/{feedback}', 'ShowController')->name('admin.feedback.show');
            Route::get('/feedbacks/{feedback}/edit', 'EditController')->name('admin.feedback.edit');
            Route::patch('/feedbacks/{feedback}', 'UpdateController')->name('admin.feedback.update');
            Route::delete('/feedbacks/{feedback}', 'DestroyController')->name('admin.feedback.delete');
        });
    });

    //Kurator basic posts routes
    Route::group(['namespace' => 'Kurator', 'prefix' =>'kurator'], function() {
        Route::group(['namespace' => 'Post'], function() {
            Route::get('/post', 'IndexController')->name('kurator.post.index');
            Route::get('/posts/create', 'CreateController')->name('kurator.post.create');
            Route::post('/posts', 'StoreController')->name('kurator.post.store');
            Route::get('/posts/{post}', 'ShowController')->name('kurator.post.show');
            Route::get('/posts/{post}/edit', 'EditController')->name('kurator.post.edit');
            Route::patch('/posts/{post}', 'UpdateController')->name('kurator.post.update');
            Route::delete('/posts/{post}', 'DestroyController')->name('kurator.post.delete'); 
        });
    });
    
    //Basic feedback routes
    Route::group(['namespace' => 'Feedback'], function() {
        Route::get('/feedback', 'IndexController')->name('feedback.index');
        Route::get('/feedbacks/create', 'CreateController')->name('feedback.create');
        Route::post('/feedbacks', 'StoreController')->name('feedback.store');
        Route::get('/feedback/success', function () {
            return view('feedback.success');
        })->name('feedback.success');
    });

    Auth::routes();