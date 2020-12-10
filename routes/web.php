
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



/*mode de paiement*/
Route::resource('mode_paiements','ModePaiementController');

Route::resource('categories','CategoriesController');

Route::post('detail_entrees/{entree}','Detail_entreeController@store')->name('detail_entre.store');
Route::resource('detail_entrees','Detail_entreeController');

Route::resource('entrees','EntreesController');

Route::resource('fournisseurs','FournisseursController');

Route::resource('magasins','MagasinController');

Route::resource('produits','ProduitsController');

Route::resource('typeentrees','TypeentreeController');

Route::resource('unitemesures','UnitemesureController');
