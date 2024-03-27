<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:show.categories', ['only' => ['index']]);
        $this->middleware('permission:create.category', ['only' => ['create','store','addPermissionToRole','givePermissionToRole']]);
        $this->middleware('permission:edit.category', ['only' => ['update','edit']]);
        $this->middleware('permission:delete.category', ['only' => ['destroy']]);
        
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $request = request();
        $query = Category::query();
        if ($name = $request->query('name')) {
            $query->where('name', '=', $name);
        }
        $categories = $query->get();
        return view('dashborad.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashborad.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        //validation form request

        Category::create(['name' => $request->name]);
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $category = Category::findOrFail($category->id);
        return view('dashborad.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {

        $category = Category::findOrFail($category->id);
        $updatedCategory = $request->validated();
        $category->update($updatedCategory);
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category = Category::findOrFail($category->id);
        $category->delete();
        return redirect()->route('categories.index');
    }
}
