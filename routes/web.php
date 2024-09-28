<?php

use App\Enums\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/greeting', function (Request $request) {
    return 'Hello World '. $request->ip();
})->middleware(['throttle:yui']);

Route::redirect('/here', '/greeting');

// Route::get('/posts/{post}/comments/{comment}', function (string $postId, string $commentId) {
//     echo 'posts '.$postId."<br/>";
//     echo 'comments '.$commentId;
// });

Route::get('/blogs/{post}/comments/{comment}', function (Request $request, string $postId, string $commentId) {
    echo 'posts '.$postId."<br/>";
    echo 'comments '.$commentId. "<br/>";

    dump($request);
});

Route::get('/users/{mser}', function (User $user) {
    return $user->name;
});

Route::get('/category/{category}', function (string $category) {
    // ...
})->whereIn('category', ['movie', 'song', 'painting']);

Route::get('/search', function () {
    // return $search;
})->name('search');


Route::get('/categories/{category}', function (Category $category) {
    return $category->value;
});


// Route::fallback(function () {
//     return "What are you looking for";
// });