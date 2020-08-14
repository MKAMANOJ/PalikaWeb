<?php

use App\EBP\Entities\Role;
use App\EBP\Entities\User;
use Illuminate\Database\Seeder;

/**
 * Class UsersTableSeeder
 */
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::where('name', 'admin')->first();
        if (!User::where('email', 'admin@admin.com')->exists()) {
            $user = User::create(
                [
                    'name'     => 'Administrator',
                    'email'    => 'admin@admin.com',
                    'password' => bcrypt('password'),
                    'active'   => 1,
                ]
            );
            $user->roles()->sync([$role->id]);
        }
        if (!User::where('email', 'agrahari.mka123@gmail.com')->exists()) {
            $user = User::create(
                [
                    'name'     => 'Manoj Agrahari',
                    'email'    => 'agrahari.mka123@gmail.com',
                    'password' => bcrypt('Administrator'),
                    'active'   => 1,
                ]
            );
            $user->roles()->sync([$role->id]);
        }
    }
}
