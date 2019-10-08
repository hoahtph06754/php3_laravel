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
Route::get('users',function(){
    // $users=factory(User::class, 10)
    // ->make()
    // ->toArray();
    $users=User::all();

    foreach ($users as $user) {
    	$user->posts;
    	// dd($user->posts->count());
    }
	return view('starter',[
		'users'=>$users->toArray(),
	]);
})->name('users.index');




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
Route::post('users/store', function(Request $request){
	$data=$request->all();
	$user=User::create([
		'name' => $data['name'],
        'email' => $data['email'],
        'birthday' => $data['birthday'],
        'password' => bcrypt('123456'),
	]);
	return redirect()->route('users.index');
})->name('users.store');


Route::view('users/create','users/create')->name('users.create');

Route::get('users/{id}',function($id){
   	$user = User::find($id);
   	
   	return view('users.show',['user'=>$user]);
})->name('users.show');

Route::get('user/edit/{id}', function($id){
	$user =User::find($id);
	// $user->name='Mon';
	// $user->email='hoayt99@gmail.com';
	// $user->save();

	return view('users.edit',['user'=>$user]);
})->name('users.edit');

Route::post('user/update/{id}', function(Request $request,$id){
	$user=User::find($id);
	$user->name=$request->name;
	$user->email=$request->email;
	$user->birthday=$request->birthday;
	$user->save();

	return redirect()->route('users.index');
})->name('users.update');

Route::post('user/delete/{id}', function($id){
	$user=User::find($id);
	$post=Post::where('user_id',$id);
	$post->delete();
	$user->delete(); 
	return redirect()->route('users.index');

})->name('users.delete');