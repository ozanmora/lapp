<?php

use App\Models\User;
use jeremykenedy\LaravelRoles\Models\Role;
use jeremykenedy\LaravelRoles\Models\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

	    /**
	     * Add Permissions
	     *
	     */
        if (Permission::where('slug', '=', 'users.list')->first() === null) {
			Permission::create([
			    'name' => 'User List',
			    'slug' => 'users.list',
			    'description' => 'Can list users',
			    'model' => 'Permission',
			]);
        }

        if (Permission::where('slug', '=', 'users.show')->first() === null) {
			Permission::create([
			    'name' => 'View User',
			    'slug' => 'users.show',
			    'description' => 'Can view user detail',
			    'model' => 'Permission',
			]);
        }

        if (Permission::where('slug', '=', 'users.create')->first() === null) {
			Permission::create([
			    'name' => 'Create User',
			    'slug' => 'users.create',
			    'description' => 'Can create new user',
			    'model' => 'Permission',
			]);
        }

        if (Permission::where('slug', '=', 'users.edit')->first() === null) {
			Permission::create([
			    'name' => 'Edit User',
			    'slug' => 'users.edit',
			    'description' => 'Can edit user',
			    'model' => 'Permission',
			]);
        }

        if (Permission::where('slug', '=', 'users.delete')->first() === null) {
			Permission::create([
			    'name' => 'Delete User',
			    'slug' => 'users.delete',
			    'description' => 'Can delete user',
			    'model' => 'Permission',
			]);
        }

    }
}
