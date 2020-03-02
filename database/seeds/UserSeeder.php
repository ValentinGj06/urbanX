<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::truncate();
        // DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $userRole = Role::where('name', 'user')->first();
        $customerRole = Role::where('name', 'customer')->first();

        $admin = User::create([
            'email' => 'admin@admin.com',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => Hash::make('password'),
            'first_name' => 'Master',
            'last_name' => 'Admin',
        ]);

        $user = User::create([
            'email' => 'user@user.com',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => Hash::make('password'),
            'first_name' => 'User',
            'last_name' => 'Owner',
        ]);

        $customer = User::create([
            'email' => 'customer@customer.com',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => Hash::make('password'),
            'first_name' => 'User',
            'last_name' => 'Customer',
        ]);

        $admin->roles()->attach($adminRole);
        $user->roles()->attach($userRole);
        $customer->roles()->attach($customerRole);
    }
}
