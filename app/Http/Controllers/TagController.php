<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:show.tags', ['only' => ['index']]);
        $this->middleware('permission:create.tag', ['only' => ['create','store','addPermissionToRole','givePermissionToRole']]);
        $this->middleware('permission:edit.tag', ['only' => ['update','edit']]);
        $this->middleware('permission:delete.tag', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();
        return view('dashborad.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('dashborad.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

             
         Tag::create([
            'name' => $request->name,
        ]);

        return redirect()->route('tags.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        $tag = Tag::findOrFail($tag->id);
        return view('dashborad.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $tag = Tag::findOrFail($tag->id);
        $newTag = $request->all();
        $tag->update($newTag);
        return redirect()->route('tags.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag = Tag::findOrFail($tag->id);
        $tag->delete();
        return redirect()->route('tags.index');
    }
}
