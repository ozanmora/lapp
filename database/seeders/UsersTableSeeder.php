<?php

namespace Database\Seeders;

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
        $userRole = config('roles.models.role')::where('slug', '=', 'user')->first();
        $adminRole = config('roles.models.role')::where('slug', '=', 'admin')->first();
        $rootRole = config('roles.models.role')::where('slug', '=', 'root')->first();
        $permissions = config('roles.models.permission')::all();

        /*
         * Add Users
         *
         */
        if (config('roles.models.defaultUser')::where('email', '=', 'root@root.com')->first() === null) {
            $newUser = config('roles.models.defaultUser')::create([
                'name'     => 'SuperUser',
                'email'    => 'root@root.com',
                'password' => bcrypt('password'),
            ]);

            $newUser->attachRole($rootRole);
        }

        if (config('roles.models.defaultUser')::where('email', '=', 'admin@admin.com')->first() === null) {
            $newUser = config('roles.models.defaultUser')::create([
                'name'     => 'Admin',
                'email'    => 'admin@admin.com',
                'password' => bcrypt('password'),
            ]);

            $newUser;
            $newUser->attachRole($adminRole);
            foreach ($permissions as $permission) {
                $newUser->attachPermission($permission);
            }
        }

        if (config('roles.models.defaultUser')::where('email', '=', 'user@user.com')->first() === null) {
            $newUser = config('roles.models.defaultUser')::create([
                'name'     => 'User',
                'email'    => 'user@user.com',
                'password' => bcrypt('password'),
            ]);

            $newUser;
            $newUser->attachRole($userRole);
        }
    }
}
