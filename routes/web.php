<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingConteoller;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use App\Models\post;
use App\Models\Profile;
use App\Models\Tag;
use App\Models\User;
use Symfony\Component\Routing\Route as RoutingRoute;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/test', function () {
    $posts = post::find(3)->tags;
    return $posts;
});

// Route::get('/test/', function(){
// 	return Profile::find(1)->user;
// });

// =======================>>>FrontEndController>>>=======================
Route::get('/',[FrontEndController::class, 'index'])->name('home');
Route::get('/detailsPost/{id}/{slug}',[FrontEndController::class, 'details'])->name('details_post');
Route::get('/CategoryPost/{id}',[FrontEndController::class, 'singleCategory'])->name('singleCategory_post');

Route::get('/singleTag/{id}',[FrontEndController::class, 'singleTag'])->name('singleTag_post');

Route::get('/searchPost',[FrontEndController::class, 'searchPost'])->name('search_post');

// ==========>>>SubscriberController>>>==========
Route::post('/SubscriberStore', [SubscriberController::class, 'store'])->name('Subscriber_store');

// ==========>>>CommentController>>>==========
Route::post('/postComment', [CommentController::class, 'store'])->name('post_comment');



// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

Route::group([ 'middleware'=> ['auth:sanctum', config('jetstream.auth_session'), 'verified']] ,function(){

    // =======================>>>dashboardController>>>=======================
    Route::get('/dashboard',[dashboardController::class, 'index'])->name('dashboard');

    // =======================>>>CategoryController<<<=======================
    Route::get('/category',[CategoryController::class, 'index'])->name('category');
    Route::get('/addcategory',[CategoryController::class, 'create'])->name('AddCategory'); 
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category_store');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category_edit')->middleware('Admin');
    Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category_update')->middleware('Admin');
    Route::get('/category/destroy/{id}', [CategoryController::class, 'destroy'])->name('category_destroy')->middleware('Admin');
    Route::get('/categoryActive/{id}', [CategoryController::class, 'Active'])->name('Active');
    Route::get('/categoryDeactive/{id}', [CategoryController::class, 'Deactive'])->name('Deactive');


    // =======================>>>PostsController<<<=======================
    Route::get('/tag',[TagController::class, 'index'])->name('tag');
    Route::get('/createTag',[TagController::class, 'create'])->name('create_tag');
    Route::post('/storeTag',[TagController::class, 'store'])->name('tag_store');
    Route::get('/editTag/{id}',[TagController::class, 'edit'])->name('edit_tag')->middleware('Admin');
    Route::post('/updateTag/{id}',[TagController::class, 'update'])->name('update_tag')->middleware('Admin');
    Route::get('/destroyTag/{id}',[TagController::class, 'destroy'])->name('destroy_tag')->middleware('Admin');


    // =======================>>>PostsController<<<=======================
    Route::get('/post',[PostsController::class, 'index'])->name('post');
    Route::get('/post/create',[PostsController::class, 'create'])->name('create_post');
    Route::post('/post/store',[PostsController::class, 'store'])->name('store_post');
    Route::get('/post/trash/{id}',[PostsController::class, 'destroy'])->name('destroy_post')->middleware('Admin');
    Route::get('/post/trashedPost',[PostsController::class, 'trashed'])->name('trashed_post')->middleware('Admin');
    Route::get('/post/killPost/{id}',[PostsController::class, 'kill'])->name('kill_post')->middleware('Admin');
    Route::get('/post/restorePost/{id}',[PostsController::class, 'restore'])->name('restore_post')->middleware('Admin');
    Route::get('/post/editPost/{id}',[PostsController::class, 'edit'])->name('edit_post')->middleware('Admin');
    Route::post('/post/updatePost/{id}',[PostsController::class, 'update'])->name('update_post')->middleware('Admin');
    
    // =======================>>>UsersController<<<=======================
    Route::get('/user', [UsersController::class, 'index'])->name('user');
    Route::get('/userCreate', [UsersController::class, 'create'])->name('create_user');
    Route::get('/userStroe', [UsersController::class, 'store'])->name('user_store');
    Route::get('/userDestroy/{id}', [UsersController::class, 'destroy'])->name('user_destroy');
    Route::get('/userMakeAdmin/{id}', [UsersController::class, 'MakeAdmin'])->name('MakeAdmin');
    Route::get('/userRemoveAdmin/{id}', [UsersController::class, 'RemoveAdmin'])->name('RemoveAdmin');


    // =======================>>>ProfileController<<<=======================
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/edit_profile', [ProfileController::class, 'edit'])->name('edit_profile');
    Route::post('/update_profile/{id}',[ProfileController::class, 'update'])->name('update_profile');

        // =======================>>>SettingConteoller<<<=======================
    Route::get('/setting', [SettingConteoller::class, 'index'])->name('setting');
    Route::post('/update_setting',[SettingConteoller::class, 'update'])->name('update_setting');



 });
    