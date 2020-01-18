<?php
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
use App\Models\User;
use App\Models\Post;
// use Faker\Generator as Faker;
use Illuminate\Http\Request;


Route::get('/', function () {
	// dd("hoa");
    return view('welcome');
});
// })->middleware('check_admin_role');

Route::get('post',function(){
	    // $posts=factory(Post::class, 10)
	    // ->make()
	    // ->toArray();
	    $posts=Post::all();

	    foreach ($posts as $post) {
	    	$post->user;
	    }
	    // $posts=$posts->toArray()
	    // dd($posts[0]['user']['name']);
		return view('post',[
			'posts'=>$posts->toArray(),
		]);
});

Route::group([
	'prefix' =>'users',
	'as'=>'users.',
	'middleware' => 'check_admin_role',
], function ()
{
	//routes

	Route::get('/', 'UserController@index')->name('index');

	Route::post('store', 'UserController@store')->name('store');


	Route::get('create','UserController@create')->name('create');

	Route::get('{id}', 'UserController@show')->name('show');

	Route::get('edit/{id}','UserController@edit')->name('edit');

	Route::post('update/{id}', 'UserController@update')->name('update');

	Route::post('delete/{id}','UserController@destroy')->name('delete');
});
Route::get('login','AuthController@getLoginForm')->name('auth.login_form');
Route::post('login','AuthController@login')->name('auth.login');
