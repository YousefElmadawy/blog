<?php

namespace App\Http\Controllers;

use App\Interfaces\UserRepositoryInterface;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface  $userRepository)
    {
        $this->userRepository = $userRepository;

        $this->middleware('permission:show.users', ['only' => ['index']]);
        $this->middleware('permission:create.user', ['only' => ['create', 'store', 'addPermissionToRole', 'givePermissionToRole']]);
        $this->middleware('permission:edit.user', ['only' => ['update', 'edit']]);
        $this->middleware('permission:delete.user', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = $this->userRepository->getAllUsers();
        return view('dashborad.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $roles = Role::pluck('name', 'name')->all();
        return view('dashborad.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        // dd($request);

        $attributes = $request->only([
            'name',
            'email',
            'roles'
        ]);

        $attributes['password'] = bcrypt($request->password);

        $user = $this->userRepository->createUser($attributes)->syncRoles($request->roles);

        // $user=User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' =>Hash::make($request->password),

        // ]);

        // $this->userRepository->syncRoles($user, $request->roles);

        // $user->syncRoles($request->roles);



        return to_route('users.index');
    }


    public function show(string $id)
    {
        //
    }


    public function edit(User $user)
    {
        $user = User::findOrFail($user->id);
        $roles = Role::pluck('name', 'name')->all();
        $userRoles = $user->roles->pluck('name', 'name')->all();

        return view('dashborad.users.edit', compact('user', 'roles', 'userRoles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {

        $attributes = $request->only([
            'name',
            'email',

        ]);

        if (!empty($request->password)) {
            $attributes['password'] = bcrypt($request->password);
        }


        $this->userRepository->updateUser($user, $attributes);
        $user->syncRoles($request->roles);

        // $user->update($attributes);
        // $user->syncRoles($request->roles);
        return to_route('users.index');
    }

    public function destroy(User $user)
    {
        $this->userRepository->deleteUser($user);
        return to_route('users.index');
    }
}
