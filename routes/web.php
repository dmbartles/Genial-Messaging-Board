<?php


# View main page
Route::get('/', 'FormController@main');
Route::get('/index', 'FormController@index');

# Create a post
Route::get('/post/create', 'FormController@create');
Route::post('/post/store', 'FormController@store');
# Create a comment
Route::post('/post/{id}/comment', 'FormController@comment');
# Edit a post
Route::get('/post/{id}/edit', 'FormController@edit');
Route::put('/post/{id}', 'FormController@update');
# Delete a post
Route::get('/post/{id}/delete', 'FormController@delete');
Route::delete('/post/{id}', 'FormController@destroy');
# View a post
Route::get('/post/{id}', 'FormController@show');
# Search all posts
#Route::get('/post', 'FormController@search');


Route::get('/debug', function () {

    $debug = [
        'Environment' => App::environment(),
        'Database defaultStringLength' => Illuminate\Database\Schema\Builder::$defaultStringLength,
    ];

    try {
        $databases = DB::select('SHOW DATABASES;');
        $debug['Database connection test'] = 'PASSED';
        $debug['Databases'] = array_column($databases, 'Database');
    } catch (Exception $e) {
        $debug['Database connection test'] = 'FAILED: '.$e->getMessage();
    }

    dump($debug);
});

Route::get('/env', function () {
    dump(config('app.name'));
    dump(config('app.env'));
    dump(config('app.debug'));
    dump(config('app.url'));
});

Route::get('/dumpall', 'FormController@DumpAll');
