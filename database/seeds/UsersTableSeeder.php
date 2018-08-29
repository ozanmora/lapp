<?php

use App\Models\User;
use jeremykenedy\LaravelRoles\Models\Role;
use jeremykenedy\LaravelRoles\Models\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $userRole 			= Role::where('slug', '=', 'user')->first();
        $rootRole 			= Role::where('slug', '=', 'root')->first();
        $adminRole 			= Role::where('slug', '=', 'admin')->first();
		$permissions 		= Permission::all();

	    /**
	     * Add Users
	     *
	     */
        if (User::where('email', '=', 'root@root.com')->first() === null) {

	        $newUser = User::create([
	            'name' => 'SuperUser',
	            'email' => 'root@root.com',
	            'password' => bcrypt('password'),
	        ]);

	        $newUser->attachRole($rootRole);
        }

        if (User::where('email', '=', 'admin@admin.com')->first() === null) {

	        $newUser = User::create([
	            'name' => 'Administrator',
	            'email' => 'admin@admin.com',
	            'password' => bcrypt('password'),
	        ]);

	        $newUser->attachRole($adminRole);

        }

        if (User::where('email', '=', 'user@user.com')->first() === null) {

	        $newUser = User::create([
	            'name' => 'User',
	            'email' => 'user@user.com',
	            'password' => bcrypt('password'),
	        ]);

	        $newUser;
	        $newUser->attachRole($userRole);

        }

    }
}
