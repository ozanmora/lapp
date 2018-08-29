<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\User;
use jeremykenedy\LaravelRoles\Models\Role;
use jeremykenedy\LaravelRoles\Models\Permission;
use Auth;
use Illuminate\Support\Facades\Log;

class RoleManagement extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::paginate(10);

        return view('admin.pages.role_management.index', ['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::orderBy('slug', 'asc')->get();

        $option_permisisons = array();
        foreach ($permissions as $permission) {
            $option_permisisons[$permission->id] = $permission->name;
        }

        $data = [
            'permissions' => $option_permisisons,
        ];

        return view('admin.pages.role_management.create', $data);
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
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:roles',
            'description' => 'nullable|string|max:255',
            'level' => 'required|integer|min:0|max:5',
        ]);

        $role = Role::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
            'level' => ($request->slug === 'root') ? 5 : $request->level,
        ]);

        $role->save();

        if ($role->slug === 'root') {
            $permissions = Permission::orderBy('slug', 'asc')->get();
            foreach ($permissions as $permission) {
                $role->attachPermission($permission);
            }
        } elseif ($request->has('permissions')) {
            $role->syncPermissions($request->permissions);
        }

        $role->save();

        return redirect()->route('admin.roles')->with('success', trans('role_management.message.success_create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::findOrFail($id);

        $data = [
            'role' => $role
        ];

        return view('admin.pages.role_management.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::orderBy('slug', 'asc')->get();

        $option_permisisons = array();
        foreach ($permissions as $permission) {
            $option_permisisons[$permission->id] = $permission->name;
        }

        $selected_permissions = array();
        if (count($role->permissions) > 0) {
            foreach ($role->permissions as $permission) {
                $selected_permissions[] = $permission->id;
            }
        }

        $data = [
            'role' => $role,
            'permissions' => $option_permisisons,
            'selected_permissions' => $selected_permissions
        ];

        return view('admin.pages.role_management.edit', $data);
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
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:roles,slug,'.$id,
            'description' => 'nullable|string|max:255',
            'level' => 'required|integer|min:0|max:5',
        ]);

        $role = Role::findOrFail($id);

        $role->name = $request->name;
        $role->slug = $request->slug;
        $role->level =  ($request->slug === 'root') ? 5 : $request->level;
        if ($request->filled('description')) {
            $role->description = $request->description;
        }

        if ($role->slug === 'root') {
            $permissions = Permission::orderBy('slug', 'asc')->get();
            foreach ($permissions as $permission) {
                $role->attachPermission($permission);
            }
        } elseif ($request->has('permissions')) {
            $role->syncPermissions($request->permissions);
        }

        $role->save();

        return redirect()->route('admin.roles.show', $role)->with('success', trans('role_management.message.success_update'));
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
        $role = Role::findOrFail($id);

        if ((int) $role->id === (int) $currentUser->roles[0]->id) {
            return back()->with('error', trans('role_management.message.error_delete_self'));
        }

        if (count($role->users) > 0) {
            return back()->with('error', trans('role_management.message.error_delete_has_user', ['count' => count($role->users)]));
        }

        $role->delete();

        return redirect()->route('admin.roles')->with('success', trans('role_management.message.success_delete'));

    }

    /**
     * Detach the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $role_id
     * @param  string  $model
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detach(Request $request, $role_id, $model, $id)
    {
        $role = Role::findOrFail($role_id);

        switch ($model) {
            case 'permission':
                $permission = Permission::findOrFail($id);
                $role->detachPermission($permission);
                $role->save();

                return redirect()->route('admin.roles.show', $role)->with('success', trans('role_management.message.success_detach_permission'));
                break;
            case 'user':
                $user = User::findOrFail($id);
                $user->detachRole($role);
                $user->save();

                return redirect()->route('admin.roles.show', $role)->with('success', trans('role_management.message.success_detach_user'));
                break;
        }

        return back()->with('error', trans('role_management.message.error_undefined'));
    }
}
