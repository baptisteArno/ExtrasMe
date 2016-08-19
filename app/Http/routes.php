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

Route::get('/', ['as' => 'index', "uses" => "IndexController@index"]);
Route::get('login', ['as' => 'login_form', "uses" => "AuthController@showLoginForm"]);
Route::post('login', ['as' => 'authenticate', "uses" => "AuthController@login"]);
Route::get('logout', ['as' => 'logout', "uses" => "AuthController@logout"]);

Route::group(['prefix' => '{username}/admin'], function($app){
   $app->get('index', ['as' => 'index_admin', "uses" => "AdminController@index"]);
   $app->get('show', ['as' => 'show_admin', "uses" => "AdminController@show"]);
   $app->get('edit', ['as' => 'edit_admin', "uses" => "AdminController@edit"]);
   $app->get('destroy', ['as' => 'destroy_admin', "uses" => "AdminController@destroy"]);
   $app->get('create', ['as' => 'create_admin', "uses" => "AdminController@create"]);
});

Route::group(['prefix' => '{username}'], function($app) {
   $app->get('/', ['as' => 'home', "uses" => "ProfileController@show"]);
   $app->get('account', ['as' => 'account', "uses" => "AccountController@show"]);

   Route::group(['prefix' => 'extra'], function($app) {
      $app->get('{id}/apply', ['as' => 'extra_apply', 'uses' => 'ExtraController@apply']);
      $app->get('list/{type_extra}',  ['as' => 'extra_list',   "uses" => "ExtraController@showList"]);
      $app->post('search', ['as' => 'extra_search', "uses" => "ExtraController@search"]);
      $app->post('submit', ['as' => 'extra_submit', "uses" => "ExtraController@submit"]);
      $app->get ('myextras', ['as' => 'my_extras', "uses" => "ExtraController@myExtras"]);
      $app->get('{ExtraID}/accept/{studentID}', function($username, $extraID, $studentID){
      return App\Http\Controllers\ExtraController::acceptExtra($extraID, $studentID);
   });
      Route::group(['prefix' => 'favorite'], function($app) {
         $app->get ('/', ['as' => 'my_favorite_extras', "uses" => "ExtraController@showFavorite"]);
         $app->get ('search', ['as' => 'my_favorite_extras_search', "uses" => "ExtraController@showFavoriteSearch"]);
         $app->get ('{id}', function($username, $id){
            return App\Http\Controllers\ExtraController::favoriteAdd($id);
         });
         $app->get ('{id}/delete', function($username, $id){
            return App\Http\Controllers\ExtraController::favoriteDelete($id);
         });
      });
   });

   $app->get('dashboard', ['as' => 'dashboard', "uses" => "DashboardController@show"]);

   $app->get('calendar', ['as' => 'calendar', "uses" => "CalendarController@showCalendar"]);
   $app->get('experience', ['as' => 'experience', "uses" => "ExperienceController@show"]);

   $app->get('applicationDownload', ['as' => 'applicationDownload', "uses" => "ProfileController@showApplicationDownload"]);

   $app->post('registerPost', ['as' => 'register_update', "uses" => "AccountController@registerUpdate"]);
   $app->get('modifFiles', ['as' => 'modif_files', "uses" => "AccountController@filesReset"]);
   $app->post('cvPost', ['as' => 'cv_update', "uses" => "AccountController@cvUpdate"]);
   $app->post('profilePost', ['as' => 'profile_update', "uses" => "AccountController@profileUpdate"]);
   $app->post('descriptionPost', ['as' => 'description_update', "uses" => "AccountController@descriptionUpdate"]);
});

Route::group(['prefix' => 'signup'], function($app) {
   $app->get('/', ["uses" => "IndexController@redirect"]);

   $app->get('professional',  ['as' => 'signup_professional',   "uses" => "SignupController@showProfessional"]);
   $app->post('professional', ['as' => 'register_professional', "uses" => "SignupController@registerProfessional"]);

   $app->get('student',  ['as' => 'signup_student',   "uses" => "SignupController@showStudent"]);
   $app->post('student', ['as' => 'register_student', "uses" => "SignupController@registerStudent"]);

});

Route::get('about', ['as' => 'about', "uses" => "DocumentsController@about"]);

//Requêtes AJAX
Route::get('ajax/getCardContent', ['as' => 'getCard','uses' => 'AjaxController@loadCard']);
Route::get('ajax/getListContent', ['as' => 'getList','uses' => 'AjaxController@loadList']);
