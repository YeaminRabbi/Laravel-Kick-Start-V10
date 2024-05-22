<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();


        $admin = Role::create(['name' => 'admin']);
        $user = Role::create(['name' => 'user']);

        //creating a admin account
        $AdminCount = new User;
        $AdminCount->name = 'Admin';
        $AdminCount->email = 'admin@gmail.com';
        $AdminCount->password =  Hash::make('123');
        $AdminCount->save();

        $AdminCount->assignRole($admin);

        //creating a user account
        $UserAccount = new User;
        $UserAccount->name = 'User';
        $UserAccount->email = 'user@gmail.com';
        $UserAccount->password =  Hash::make('123');
        $UserAccount->status =  1;
        $UserAccount->save();

        $UserAccount->assignRole($user);
    }
}