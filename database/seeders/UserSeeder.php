<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Mr Admin';
        $user->phone = '01111111111';
        $user->email = 'admin@gmail.com';
        $user->address = 'admin -- address';
        $user->password = Hash::make('password');
        $user->save();
        $user->assignRole('Admin');

        for ($i = 1; $i <= 10; $i++) {
            $user = new User();
            $user->name = 'User '.$i;
            $user->phone = '0123456789'.$i;
            $user->email = 'user'.$i.'@gmail.com';
            $user->address = 'user '.$i.' address';
            $user->password = Hash::make('password');
            $user->save();

            $user->assignRole('Admin');
        }
    }
}
