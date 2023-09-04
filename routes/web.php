<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BeritaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});
Route::middleware(['auth'])->get('/layouts/dashboard', function () {
    return view('layouts.dashboard');
});


// Route::get('/dashboard', function () {
//     return view('layouts.dashboard');
// });

// Data Tables
// Route::get('/datatables', function () {
//     return view('datatables');
// });

// Route::get('/blogposts/create', [BlogPostController::class, 'create'])->name('blogposts.create');
// Login routes
Route::post('login', [LoginController::class, 'login'])->name('login.post');


// Register routes
Route::post('register', [RegisterController::class, 'register'])->name('register.post');


// Logout route
Route::post('logout', [LogoutController::class, 'logout'])->name('logout');

//USER
Route::get('/all-user', [UserController::class, 'AllUser'])->name('alluser');
Route::get('/add-user-index', [UserController::class, 'AddUserIndex'])->name('AddUserIndex');
Route::post('/insert-user', [UserController::class, 'InsertUser'])->name('InsertUser');
Route::get('/edit-user/{id}', [UserController::class, 'EditUser'])->name('EditUser');
Route::post('/update-user/{id}', [UserController::class, 'UpdateUser'])->name('UpdateUser');
Route::get('/delete-user/{id}', [UserController::class, 'DeleteUser'])->name('DeleteUser');

//Product
Route::get('/all-product', [ProductController::class, 'AllProduct'])->name('AllProduct');
Route::get('/add-product-index', [ProductController::class, 'AddProductIndex'])->name('AddProductIndex');
Route::post('/insert-product' , [ProductController::class, 'InsertProduct'])->name('InsertProduct');
Route::get('/edit-product/{id}', [ProductController::class, 'EditProduct'])->name('EditProduct');
Route::post('/update-product/{id}', [ProductController::class, 'UpdateProduct'])->name('UpdateProduct');
Route::get('/delete-product/{id}', [ProductController::class, 'DeleteProduct'])->name('DeleteProduct');

//Pengumuman
Route::get('/all-pengumuman', [PengumumanController::class, 'AllPengumuman'])->name('AllPengumuman');
Route::get('/add-pengumuman-index', [PengumumanController::class, 'AddPengumumanIndex'])->name('AddPengumumanIndex');
Route::post('/insert-pengumuman' , [PengumumanController::class, 'InsertPengumuman'])->name('InsertPengumuman');
Route::get('/edit-pengumuman/{id}', [PengumumanController::class, 'EditPengumuman'])->name('EditPengumuman');
Route::post('/update-pengumuman/{id}', [PengumumanController::class, 'UpdatePengumuman'])->name('UpdatePengumuman');
Route::get('/delete-pengumuman/{id}', [PengumumanController::class, 'DeletePengumuman'])->name('DeletePengumuman');

//Blog
Route::get('/all-blog',  [BlogController::class, 'AllBlog'])->name('AllBlog');
Route::get('/add-blog-index', [BlogController::class, 'AddBlogIndex'])->name('AddBlogIndex');
Route::post('/insert-blog' , [BlogController::class, 'InsertBlog'])->name('InsertBlog');
Route::get('/edit-blog/{id}', [BlogController::class, 'EditBlog'])->name('EditBlog');
Route::post('/update-blog/{id}', [BlogController::class, 'UpdateBlog'])->name('UpdateBlog');
Route::get('/delete-blog/{id}', [BlogController::class, 'DeleteBlog'])->name('DeleteBlog');

//Berita
Route::get('/all-berita', [BeritaController::class, 'AllBerita'])->name('AllBerita');
Route::get('/add-berita-index', [BeritaController::class, 'AddBeritaIndex'])->name('AddBeritaIndex');
Route::post('/insert-berita' , [BeritaController::class, 'InsertBerita'])->name('InsertBerita');
Route::get('/edit-berita/{id}', [BeritaController::class, 'EditBerita'])->name('EditBerita');
Route::post('/update-berita/{id}', [BeritaController::class, 'UpdateBerita'])->name('UpdateBerita');
Route::get('/delete-berita/{id}', [BeritaController::class, 'DeleteBerita'])->name('DeleteBerita');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
