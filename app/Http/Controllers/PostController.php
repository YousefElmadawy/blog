<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:show.posts', ['only' => ['index']]);
        $this->middleware('permission:create.post', ['only' => ['create','store','addPermissionToRole','givePermissionToRole']]);
        $this->middleware('permission:edit.post', ['only' => ['update','edit']]);
        $this->middleware('permission:delete.post', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $request = request();  //request() object of request

        //return query builder for make query in db / query() return data from url
        // $query = Post::query();

        //fetching data about title from url
        // if ($title = $request->query('title')) {
        //     $query->where('title', 'LIKE', "%{$title}%");
        // }

        //fetching data about category from url
        // if ($name = $request->query('name')) {
        //     $query->where('category_id', '=', $name);
        // }

        $posts = Post::filter($request->query())->paginate(3); //use $query cause it instance from Post Model
        $categories = Category::all();



        return view('dashborad.posts.index', compact('posts', "categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Post $post)
    {
        $categories = Category::all();
        return view('dashborad.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('images', 'public');
        }

        $post = Post::create([

            "title" => $request->title,
            "category_id" => $request->category_id,
            "image" => $path ?? "",
            "content" => $request->content,

        ]);

        //add tags and posts in post_tag table

        $tagIds = $request->get('tags');
        $post->tags()->sync($tagIds);


        return redirect()->route('posts.index');
        // return to_route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $post = Post::findOrFail($post->id);
        $categories = Category::all();
        $tags = $post->tags;
        return view('dashborad.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // $post = Post::findOrFail($post->id);

        // $old_image = $post->image;

        $data = $request->all();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('images', 'public');
        }

        $tagIds = $request->get('tags');
        $post->tags()->sync($tagIds);

        $post->update([
            "title" => $request->title,
            "category_id" => $request->category_id,
            "image" => $path,
            "content" => $request->content,


        ]);



        // $post->update($request->all());

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post = Post::findOrFail($post->id);
        $post->delete();
        return redirect()->route('posts.index');
    }
}
