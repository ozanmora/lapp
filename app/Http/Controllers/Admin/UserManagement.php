<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\User;
use jeremykenedy\LaravelRoles\Models\Role;
use jeremykenedy\LaravelRoles\Models\Permission;
use Auth;

class UserManagement extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);

        return view('admin.pages.user_management.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::orderBy('level', 'desc')->get();

        $option_roles = array();
        foreach ($roles as $role) {
            $option_roles[$role->id] = $role->name;
        }

        $data = [
            'roles' => $option_roles,
        ];

        return view('admin.pages.user_management.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users',
            'password'  => 'required|string|min:6|confirmed',
            'role'      => 'required|integer'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        $user->syncRoles([$request->role]);

        $user->save();

        return redirect()->route('admin.users')->with('success', trans('user_management.message.success_create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('admin.pages.user_management.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user  = User::findOrFail($id);
        $roles = Role::orderBy('level', 'desc')->get();

        $current_role = ($user->roles->isEmpty()) ? null : $user->roles->first()->id;

        $option_roles = array();
        foreach ($roles as $role) {
            $option_roles[$role->id] = $role->name;
        }

        $data = [
            'user'         => $user,
            'roles'        => $option_roles,
            'current_role' => $current_role,
        ];

        return view('admin.pages.user_management.edit', $data);
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
        $this->validate($request, [
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users,email,'.$id,
            'password'  => 'nullable|string|min:6|confirmed',
            'role'      => 'required|integer'
        ]);

        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->syncRoles([$request->role]);

        $user->save();

        return redirect()->route('admin.users.show', $user)->with('success', trans('user_management.message.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $currentUser = Auth::user();
        $user = User::findOrFail($id);

        if ((int) $user->id !== (int) $currentUser->id) {
            $user->delete();

            return redirect()->route('admin.users')->with('success', trans('user_management.message.success_delete'));
        }

        return back()->with('error', trans('user_management.message.error_delete_self'));
    }
}
