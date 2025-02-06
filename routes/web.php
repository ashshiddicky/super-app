<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app',['title'=>'app']);
});
Route::get('/posts', function () {
    // $posts=Post::with(['author','category'])->latest()->get();
    $posts=Post::orderBy('created_at','desc')->paginate(100);
    return view('posts',['title'=>'Artikel','posts'=>$posts]);
});
route::get('/posts/{post:slug}',function(Post $post){
     return view('post',['title'=>'Single Post','post'=>$post]);
});
route::get('/authors/{user:username}',function(User $user){
    // $posts=$user->posts->load('category','author');
    return view('posts',['title'=> count($user->posts) . ' Article by   '. $user->name,'posts'=>$user->posts]);
});
route::get('/categories/{category:slug}',function(Category $category){
    // $posts=$category->posts->load('category','author');
    return view('posts',['title'=> ' Article in  '. $category->name,'posts'=>$category->posts]);
});
Route::fallback(function () {
    return response()->view('errors.404', ['title'=> ' Indak ado'], 404);
});