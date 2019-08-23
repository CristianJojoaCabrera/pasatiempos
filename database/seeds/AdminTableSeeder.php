<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;
class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = new User();
        $user->name = 'cristian';
        $user->user_name = 'cristian91';
        $user->city = 'Factativa';
        $user->email = 'cristianjojoa01@gmail.com';
        $user->password =  Hash::make('pruebaphp');
        $user->save();
        $user->roles()->attach(Role::where('name', 'admin')->first());
    }
}
