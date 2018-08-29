<?php

use App\User;
use jeremykenedy\LaravelRoles\Models\Role;
use jeremykenedy\LaravelRoles\Models\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    /**
	     * Add Roles
	     *
	     */
    	if (Role::where('slug', '=', 'root')->first() === null) {
	        $adminRole = Role::create([
	            'name' => 'SuperUser',
	            'slug' => 'root',
	            'description' => 'SuperUser Role',
	            'level' => 5,
        	]);
        }

    	if (Role::where('slug', '=', 'admin')->first() === null) {
	        $adminRole = Role::create([
	            'name' => 'Administrator',
	            'slug' => 'admin',
	            'description' => 'Administrator Role',
	            'level' => 4,
        	]);
	    }

    	if (Role::where('slug', '=', 'moderator')->first() === null) {
	        $adminRole = Role::create([
	            'name' => 'Moderator',
	            'slug' => 'moderator',
	            'description' => 'Moderator Role',
	            'level' => 3,
        	]);
	    }

    	if (Role::where('slug', '=', 'editor')->first() === null) {
	        $adminRole = Role::create([
	            'name' => 'Editor',
	            'slug' => 'editor',
	            'description' => 'Editor Role',
	            'level' => 2,
        	]);
	    }

    	if (Role::where('slug', '=', 'user')->first() === null) {
	        $userRole = Role::create([
	            'name' => 'User',
	            'slug' => 'user',
	            'description' => 'User Role',
	            'level' => 1,
	        ]);
	    }

    	if (Role::where('slug', '=', 'unverified')->first() === null) {
	        $userRole = Role::create([
	            'name' => 'Unverified',
	            'slug' => 'unverified',
	            'description' => 'Unverified Role',
	            'level' => 0,
	        ]);
	    }

    }

}
