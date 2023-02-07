<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'Admin')->first();
        $role_user = Role::where('name', 'User')->first();

        $admin = new User();
        $admin->name = "Jan";
        $admin->surname = "Admin";
        $admin->email = "test@test.pl";
        $admin->password = bcrypt('123456');
        $admin->email_verified_at = date("Y-m-d h:i:s");
        $admin->save();
        $admin->roles()->attach($role_admin);

        $user = new User();
        $user->name = "Paweł";
        $user->surname = "User";
        $user->email = "pawel@user.pl";
        $user->password = bcrypt('123456');
        $admin->email_verified_at = date("Y-m-d h:i:s");
        $user->save();
        $user->roles()->attach($role_user);
    }
}
