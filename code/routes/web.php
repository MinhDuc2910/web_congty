<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MailBoxController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RecruitController;
use App\Http\Controllers\ReceiveEmailController;

use App\Http\Controllers\Clients\ClientsController;
use App\Http\Controllers\Clients\HomeController;
use App\Http\Controllers\Clients\IntroduceController;
use App\Http\Controllers\Clients\InputEmailController;
use App\Http\Controllers\Clients\ClientsRecruitController;
use App\Http\Controllers\Clients\WorkController;








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
Route::prefix('admin')->group(function() {

  Route::prefix('/user')->group(function() {
    Route::get('/',[UserController::class, 'user'])-> name('user');
    Route::post('/',[UserController::class, 'login'])-> name('login');
    Route::get('/logout',[UserController::class, 'logout'])-> name('logout');
   
  });
  
  Route::prefix('admin')->group(function() {
    Route::get('/',[AdminController::class, 'admin'])-> name('admin');
    Route::get('/create_account',[AdminController::class, 'create_account'])-> name('create_account');
    Route::post('/create_account',[AdminController::class, 'postAdd']);
  
    Route::get('/delete/{id}',[AdminController::class, 'delete'])-> name('delete');
    
  });
    
  Route::prefix('product')->group(function(){
    Route::get('/',[ProductController::class, 'product'])-> name('product');
  
    Route::get('/add-product',[ProductController::class, 'addProduct'])-> name('addProduct');
    Route::post('/add-product',[ProductController::class, 'postAdd'])-> name('addProduct');
  
    Route::get('/update-product/{id}',[ProductController::class, 'updateProduct'])-> name('updateProduct');
    Route::post('/update-product',[ProductController::class, 'editProduct'])-> name('editProduct');
  
    Route::get('/delete-product/{id}',[ProductController::class, 'deleteProduct'])-> name('deleteProduct');
  
  });
  
  Route::prefix('news')->group(function(){
    
    Route::get('/',[NewsController::class, 'news'])-> name('news');
  
    Route::get('/add-news',[NewsController::class, 'addNews'])-> name('addNews');
    Route::post('/add-news',[NewsController::class, 'postAdd'])-> name('postAdd');
  
    Route::get('/update-news/{id}',[NewsController::class, 'updateNews'])-> name('updateNews');
    Route::post('/update-news',[NewsController::class, 'editNews'])-> name('editNews');
  
    Route::get('/delete-news/{id}',[NewsController::class, 'deleteNews'])-> name('deleteNews');
  
  });

  Route::prefix('event')->group(function(){
    
    Route::get('/',[EventController::class, 'event'])-> name('event');
  
    Route::get('/add-Event',[EventController::class, 'addEvent'])-> name('addEvent');
    Route::post('/add-Event',[EventController::class, 'postAdd'])-> name('postAdd');
  
    Route::get('/update-Event/{id}',[EventController::class, 'updateEvent'])-> name('updateEvent');
    Route::post('/update-Event',[EventController::class, 'editEvent'])-> name('editEvent');
  
    Route::get('/delete-Event/{id}',[EventController::class, 'deleteEvent'])-> name('deleteEvent');
  
  });
  
  //--------- Nội dung----------
  Route::prefix('content')->group(function(){
    
  Route::get('/',[ContentController::class, 'content'])-> name('content');
  //---------Phần dịch vụ (Service)---------
  Route::get('/add-service',[ContentController::class, 'addService'])-> name('addService');
  Route::post('/add-service',[ContentController::class, 'postAdd'])-> name('postAdd');
  
  Route::get('/update-service/{id}',[ContentController::class, 'updateService'])-> name('updateService');
  Route::post('/update-service',[ContentController::class, 'editService'])-> name('editService');
  
  Route::get('/delete-service/{id}',[ContentController::class, 'deleteService'])-> name('deleteService');
  //---------Phần Giới thiệu (Introduce)---------------- 
  Route::get('/add-introduce',[ContentController::class, 'addIntroduce'])-> name('addIntroduce');
  Route::post('/add-introduce',[ContentController::class, 'postAddIntroduce'])-> name('postAddIntroduce');
  
  Route::get('/update-introduce/{id}',[ContentController::class, 'updateIntroduce'])-> name('updateIntroduce');
  Route::post('/update-introduce',[ContentController::class, 'editIntroduce'])-> name('editIntroduce');
  
  Route::get('/delete-introduce/{id}',[ContentController::class, 'deleteIntroduce'])-> name('deleteIntroduce');
  //---------Phần Phong cách (Style)---------------- 
  Route::get('/add-style',[ContentController::class, 'addStyle'])-> name('addStyle');
  Route::post('/add-style',[ContentController::class, 'postAddStyle'])-> name('postAddStyle');
  
  Route::get('/update-style/{id}',[ContentController::class, 'updateStyle'])-> name('updateStyle');
  Route::post('/update-style',[ContentController::class, 'editStyle'])-> name('editStyle');
  
  Route::get('/delete-style/{id}',[ContentController::class, 'deleteStyle'])-> name('deleteStyle');
  //------------Phần Cuộc Sống----------------------------
  Route::get('/add-life',[ContentController::class, 'addLife'])-> name('addLife');
  Route::post('/add-life',[ContentController::class, 'postAddLife'])-> name('postAddLife');
  
  Route::get('/update-life/{id}',[ContentController::class, 'updateLife'])-> name('updateLife');
  Route::post('/update-life',[ContentController::class, 'editLife'])-> name('editLife');
  
  Route::get('/delete-life/{id}',[ContentController::class, 'deleteLife'])-> name('deleteLife');
  
  });
  
  //-------------Phần hòm thư-----------------
  Route::get('/mailBox',[MailBoxController::class, 'mailBox'])-> name('mailBox');
  Route::get('/delete/{id}',[MailBoxController::class, 'deleteMailBox'])-> name('deleteMailBox');
  
  
  //-----------Phần liên hệ--------------
  Route::prefix('contact')->group(function(){
    
    Route::get('/',[ContactController::class, 'contact'])-> name('contact');
    Route::post('/',[ContactController::class, 'editContact'])-> name('editContact');
  
  });
  
  
  //-------------Tuyển dụng----------------
  Route::prefix('recruit')->group(function(){
    
    Route::get('/',[RecruitController::class, 'recruit'])-> name('recruit');
  
    Route::get('/add-recruit',[RecruitController::class, 'addRecruit'])-> name('addRecruit');
    Route::post('add-recruit',[RecruitController::class, 'postAdd'])-> name('postAdd');
  
    Route::get('/update-recruit/{id}',[RecruitController::class, 'updateRecruit'])-> name('updateRecruit');
    Route::post('/update-recruit',[RecruitController::class, 'editRecruit'])-> name('editRecruit');
  
    Route::get('/delete-recruit/{id}',[RecruitController::class, 'deleteRecruit'])-> name('deleteRecruit');
  });
  
  
  
  //------------Email nhận tin--------------
  Route::prefix('receiveEmail')->group(function(){
    
    Route::get('/',[ReceiveEmailController::class, 'receiveEmail'])-> name('receiveEmail');
  
    Route::get('/add-receiveEmail',[ReceiveEmailController::class, 'addReceiveEmail'])-> name('addReceiveEmail');
    Route::post('add-receiveEmail',[ReceiveEmailController::class, 'postAdd'])-> name('postAdd');
  
    Route::get('/update-receiveEmail/{id}',[ReceiveEmailController::class, 'updateReceiveEmail'])-> name('updateReceiveEmail');
    Route::post('/update-receiveEmail',[ReceiveEmailController::class, 'editReceiveEmail'])-> name('editReceiveEmail');
  
    Route::get('/delete-receiveEmail/{id}',[ReceiveEmailController::class, 'deleteReceiveEmail'])-> name('deleteReceiveEmail');
  });
});  

Route::prefix('/')->group(function() {

  // Route::get('/',[ClientsController::class, 'index'])-> name('main');

  Route::get('/',[HomeController::class, 'index'])-> name('home'); 
  Route::get('/tin-tuc/{id}.html',[HomeController::class, 'NewsContent'])-> name('NewsContent'); 
  Route::post('/',[InputEmailController::class, 'postAdd'])-> name('postAdd');

  Route::get('/Gioi-thieu',[IntroduceController::class, 'index'])-> name('introduce');
  Route::post('/Gioi-thieu',[InputEmailController::class, 'postAdd'])-> name('postAdd');

  Route::get('/Tuyen-dung',[ClientsRecruitController::class, 'index'])-> name('clientsRecruit');
  Route::post('/Tuyen-dung',[ClientsRecruitController::class, 'postAdd'])-> name('postAdd');
  Route::get('/Tuyen-dung/{id}.html',[ClientsRecruitController::class, 'RecruitContent'])-> name('RecruitContent');
  Route::post('/Tuyen-dung/{id}.html',[ClientsRecruitController::class, 'postAdd'])-> name('postAdd');

  Route::get('/Hoat-dong',[WorkController::class, 'index'])-> name('work');
  Route::post('/Hoat-dong',[WorkController::class, 'postAdd'])-> name('postAdd');

  
});




