<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Categories;
use App\Models\User;

class HomeController extends Controller
{

    public function index($name = null)
    {

        $post = Post::latest()->paginate(6); //get all data
        //with for send post in view
        return view("home")->with(
            [
                "posts" => $post,
            ]

        );
    }
    public function show($slug = null)
    {
        $post = Post::where("slug", $slug)->first();
        return view("show", ["posts" => $post]);
    }
    public function create()
    {
       // $this->authorize('create', Post::class);

        $cat = Categories::all();
        return view("posts.create",["cat"=>$cat]);
    }
    public function store(PostRequest $request)
    {

        if ($request->has("image")) {
            $file = $request->image;

            $image_name = time() . "_" . $file->getClientOriginalName();

            $file->move(public_path('uploads'), $image_name);
        }

        //  dd($request->all()); //show all data geted by form
        //mt1
        // $post=new posts();
        // $post->title=$request->title;
        // $post->body=$request->body;
        // $post->slug=Str::slug($request->title);
        // $post->image= "https://cdn.pixabay.com/photo/2023/02/09/16/36/bridge-7779222_960_720.jpg";
        // $post->save();
        //mt2
        Post::create(
            [
                "title" => $request->title,
                "body" => $request->body,
                "slug" => Str::slug($request->title),
                "image" => $image_name,
                "user_id" => auth()->user()->id,
                "cat_id" => $request->cat_id
            ]
        );
        return redirect()->route("home")->with([
            "success" => "articel ajouté"
        ]);
    }
    // edit page
    public function edit($slug = null)
    {

       $cat = Categories::all();
       $post = Post::where("slug", $slug)->first();
        $this->authorize('update', $post);
      
        return view("posts.edit", ["posts" => $post,"cat"=>$cat]);
    }
    // update data
    public function update(PostRequest $request, $id = null)
    {
        $post = Post::where("id", $id)->first();
        $this->authorize('update', $post);
        if ($request->has("image")) {
            $file = $request->image;
            $image_name = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $image_name);
            if (file_exists(public_path('uploads') . "/" . $post->image) and $post->image !=="default.png") {

                unlink(public_path('uploads') . "/" . $post->image); //delete file
            }
            $post->image = $image_name;
        }
        $post->update([
            "title" => $request->title,
            "body" => $request->body,
            "slug" => Str::slug($request->title),
            "image" => $post->image,
            "cat_id" => $request->cat_id
        ]);
        return redirect()->route("home")->with([
            "success" => "articel modifier"
        ]);
    }
    public function delete($id = null)
    {
        $post = Post::where("id", $id)->first();
        $this->authorize('delete', $post);
        $post->delete();

        return redirect()->route("home")->with([
            "success" => "articel supprimé"
        ]);
    }
}
