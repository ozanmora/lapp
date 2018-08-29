<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\User;
use jeremykenedy\LaravelRoles\Models\Role;
use jeremykenedy\LaravelRoles\Models\Permission;
use Auth;

class PermissionManagement extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::paginate(10);

        return view('admin.pages.permission_management.index', ['permissions' => $permissions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.pages.permission_management.create');
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
            'slug' => 'required|string|max:255|unique:permissions',
            'description' => 'nullable|string|max:255',
            'model' => 'nullable|string|max:255',
        ]);

        $permission = Permission::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
            'model' => $request->model,
        ]);

        $permission->save();

        return redirect()->route('admin.permissions')->with('success', trans('permission_management.message.success_create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permission = Permission::findOrFail($id);

        $data = [
            'permission' => $permission
        ];

        return view('admin.pages.permission_management.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = Permission::findOrFail($id);

        $data = [
            'permission' => $permission,
        ];

        return view('admin.pages.permission_management.edit', $data);
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
            'slug' => 'required|string|max:255|unique:permissions,slug,'.$id,
            'description' => 'nullable|string|max:255',
            'model' => 'nullable|string|max:255',
        ]);

        $permission = Permission::findOrFail($id);

        $permission->name = $request->name;
        $permission->slug = $request->slug;
        $permission->description = $request->description;
        $permission->model = $request->model;

        $permission->save();

        return redirect()->route('admin.permissions.show', $permission)->with('success', trans('permission_management.message.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$currentUser = Auth::user();
        $permission = Permission::findOrFail($id);

        /*
        if ((int) $permission->id === (int) $currentUser->permissions[0]->id) {
            return back()->with('error', trans('permission_management.message.error_delete_self'));
        }

        if (count($permission->users) > 0) {
            return back()->with('error', trans('permission_management.message.error_delete_has_user', ['count' => count($permission->users)]));
        }
        */

        $permission->delete();

        return redirect()->route('admin.permissions')->with('success', trans('permission_management.message.success_delete'));

    }

    /**
     * Detach the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $permission_id
     * @param  string  $model
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detach(Request $request, $permission_id, $model, $id)
    {
        $permission = Permission::findOrFail($permission_id);

        switch ($model) {
            case 'role':
                $role = Role::findOrFail($id);
                $role->detachPermission($permission);
                $role->save();

                return redirect()->route('admin.permissions.show', $permission)->with('success', trans('permission_management.message.success_detach_role'));
                break;
            case 'user':
                $user = User::findOrFail($id);
                $user->detachPermission($permission);
                $user->save();

                return redirect()->route('admin.permissions.show', $permission)->with('success', trans('permission_management.message.success_detach_user'));
                break;
        }

        return back()->with('error', trans('permission_management.message.error_undefined'));
    }
}
