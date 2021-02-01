<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Jobs\SendDeletedPostNotify;
use App\Models\Category;
use App\Models\Image;
use App\Models\Post;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::with(['tags','categories','image', 'author'])->latest()->Paginate(15);
        return view('home')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags=Tag::all()->pluck('id','title');
        $categories=Category::all()->pluck('id','title');
        return view('post.create',compact('categories',$categories))->with('tags',$tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        $post = auth()->user()->posts()->create($request->only('title','content','published'));
        $post->tags()->sync($request->get('tags'));
        $post->categories()->sync($request->get('categories'));

        $path = $request->file('image')->store('public/post');
        Image::create([
            'title' => $request->title,
            'alt' => "This is the image of post $request->title",
            'path' => $path,
            'imageable_id' => auth()->id(),
            'imageable_type' => Post::class,
        ]);
        return redirect()->route('home')->with('status','post published');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {

        return view('post.show')->with('post',$post);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function draft(Post $post)
    {

        $post->published=!$post->published;
        $post->save();
        return redirect()
            ->back()
            ->with('status', 'post drafted sucesfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {

        $post->delete();
        SendDeletedPostNotify::dispatch($post);


        return redirect()->back()->with('status', '');
    }

    public function restore($post)
    {
        Post::withTrashed()->find($post)->restore();

        return redirect()->back();
    }
    public function terminate($post)
    {
        $post=Post::withTrashed()->find($post);
        Storage::delete($post->image->path);
        $post->image()->delete();
        $post->forceDelete();
        return redirect()->back();

    }
}
