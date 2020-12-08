
<?php

use App\Typeentree;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



//Route::resource('admin/users','Admin\UsersController');
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){

	Route::resource('users', 'UsersController');

});


/* TypeEntrees */

Route::resource('typeentrees', 'TypeentreeController');
Route::resource('entrees', 'EntreesController');
Route::resource('fournisseurs', 'FournisseursController');
Route::resource('mode_paiements', 'ModePaiementController');
Route::resource('unitemesures', 'UnitemesureController');

Route::resource('produits','ProduitsController');

Route::resource('categories','CategoriesController');
Route::resource('detail_entrees','Detail_entreeController');

Route::get('detail_entrees/index/{Entree}','EntreesController@detail');
