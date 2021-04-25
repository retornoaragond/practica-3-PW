<?php
    
    Route::get('/', function () {
        return view('main_page');
    });
    Route::get('home', function () {
        return view('main_page');
    });
    Route::resource('books', 'BooksController');
    Route::get('/books/(:number)/delete','BooksController@destroy');
    Route::post('/books/(:number)/update','BooksController@update');
    Route::resource('authors', 'AuthorsController');
    Route::get('/authors/(:number)/delete','AuthorsController@destroy');
    Route::post('/authors/(:number)/update','AuthorsController@update');
    Route::resource('publishers', 'PublishersController');
    Route::get('/publishers/(:number)/delete','PublishersController@destroy');
    Route::post('/publishers/(:number)/update','PublishersController@update');
    Route::dispatch();
?>
