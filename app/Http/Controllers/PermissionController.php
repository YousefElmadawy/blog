<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:show.permissions', ['only' => ['index']]);
        $this->middleware('permission:create.permission', ['only' => ['create','store','addPermissionToRole','givePermissionToRole']]);
        $this->middleware('permission:edit.permission', ['only' => ['update','edit']]);
        $this->middleware('permission:delete.permission', ['only' => ['destroy']]);
    }

    public function index()
    {
        $permissions=Permission::paginate(4);
        return view('dashborad.role-permission.permission.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashborad.role-permission.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:permissions,name'
            ]
        ]);

        Permission::create([
            'name'=>$request->name,
        ]);
        
        return to_route('permissions.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        $permission=Permission::findOrFail($permission->id) ;
        return view('dashborad.role-permission.permission.edit',compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {
        $permission = Permission::findOrFail($permission->id);
        $permission->update([
            'name'=>$request->name,
        ]);
        return to_route('permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission = Permission::findOrFail($permission->id);
        $permission->delete();
        return to_route('permissions.index');
    }
}
