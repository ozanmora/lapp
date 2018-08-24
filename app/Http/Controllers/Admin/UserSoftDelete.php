<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserSoftDelete extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::onlyTrashed()->paginate(15);

        $data = [
            'users' => $users,
        ];

        return view('admin.pages.user_management.trash', ['users' => $users]);
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
        $user = self::getDeletedUser($id);

        $user->restore();

        return redirect()->route('admin.users.trash')->with('success', trans('user_management.message.success_restore'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = self::getDeletedUser($id);

        $user->forceDelete();

        return redirect()->route('admin.users.trash')->with('success', trans('user_management.message.success_force_delete'));

    }

    /**
     * Get Soft Deleted User.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public static function getDeletedUser($id)
    {
        $user = User::onlyTrashed()->where('id', $id)->get();

        if (count($user) !== 1) {
            return redirect()->route('admin.users.trash')->with('error', trans('user_management.message.error_not_found'));
        }

        return $user[0];
    }
}
