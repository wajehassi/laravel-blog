<?php
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Role;
use App\User;


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

        $admin = new User();
        $admin->name ='admin';
        $admin->email = 'admin@admin.ps';
        $admin->password = Hash::make('123123123');
        $admin->save();
        $admin->roles()->attach($role_admin);
    }
}
