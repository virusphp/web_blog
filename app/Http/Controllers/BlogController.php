<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//untuk connection db
use Illuminate\Support\Facades\DB;
// use Illuminate\Http\UploadedFile;
//untuk menggunakan fungsi email
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
//connect model , dan connect mail
use App\Blog;
use App\Mail\BlogPosted;
class BlogController extends Controller
{
  public function home()
  {
    //memanggil hasil table eloquent
    //pagination dalam laravel
    $blog = blog::paginate(15);
    // $blog = blog::all();
    // $url = route('index',['blog' => $blog]);
    // return $url;
    return view('blog/index',['blog' => $blog]);

  }

  public function all(){

  $blog = blog::all();
  return view('/blog/all',['blog' =>$blog]);
  }


  public function show($id){

    //fungsi mencari kolom
    $blog = blog::find($id);

    if (!$blog) {
      abort('404');
    }

  return view('blog/section',['blog' => $blog]);
    /*query builder
    $blog = DB::table('users')->get();
    DB::table('users')->insert([
        ['username' => 'hendra','email' => 'gunawan4041@gmail.com' , 'password' => 'gunawan'],
        ['username' => 'hend123ra','email' => 'guna123wan4041@gmail.com' , 'password' => 'gunawan123'],
    ]);*/
    // $users = DB::table('users')->where('username' ,'like','%123%')->get();
  }


  //function buat create tanpa menggunakan $_POST dll , cukup dengn request
  public function create()
  {
    return view('blog/create');
  }

  //jika insert menggunakan form , ialah menggunakan variable Request
  public function store(Request $request)
  {

    //penggunaan validasi
    $request->validate([
        'title' => 'required|min:5|max:255',
        'description' => 'required|min:5|max:255',
        'email' => 'required|min:5|max:255|email',
        'feature_img' => 'required|mimes:jpg,jpeg,png|max:300'
    ]);

    //untuk upload image
    $request->file('feature_img')->store('blogger'); 

    $blog = new blog;
    $blog->email = $request->email;
    $blog->title = $request->title;
    $blog->description = $request->description;
    $blog->save();
    //untuk pengiriman email , atau menggunakan email
    Mail::to($request->email)->send(new BlogPosted($blog));

    return redirect()->route('index');

    // membuat table , mencreate table dengan masss assigment
    //     blog::create([
    //       'title' => "hendra ganteng sekali",
    //       "description" => "kaimook akan menjadi jodoh masa depan ",
    //     ]);

  }


  //function buat edit
  public function edit($id)
  {

      $blog = blog::find($id);
      // $url = route('edit',['blog' => $blog]);
      // return $url;
      return view('/blog/edit',['blog' => $blog]);
  }

  //function buat update , sama seperti create tanpa $_POST
  public function update(Request $request,$id)
  {
    // dd($request);
    $blog = blog::find($id);
    $blog->title       = $request->title;
    $blog->description = $request->description;
    $blog->save();
    //untuk reddirect menggunakan nomor id
    return redirect()->Route('index',['id' =>$id]);

    //membuat update
    //mass assigment
    // blog::find(20)->update([
    //     'title' => "hendra ganteng sekali kimakk owkokowkowk",
    //     'desription' => "ooooooooooooooooooooooooooooooooooooooooo",
    // ]);

  }

  public function destroy($id)
  {

    //fungsi delete biasa
    $blog = blog::find($id);
    $blog->delete();
    return redirect('blog');

    // fungsi delete mass assigment
    // blog::destroy(20);

    //soft delete
    // $blog = blog::find(16);
    // $blog->delete();

    // merestore yang hilang dgn soft delete
    // blog::withTrashed()->restore();

  }
  // public function restore()
  // {
  // blog::withTrashed()->restore();
  // }

}
