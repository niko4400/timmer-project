<?php

use Illuminate\Database\Seeder;
use \App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->id=1;
        $user->name = 'Adam';
        $user->email = 'a@wp.pl';
        $user->password = bcrypt('aaa');
        $user->save();

        $user = new User();
        $user->id=2;
        $user->name = 'Tomek';
        $user->email = 't@wp.pl';
        $user->password = bcrypt('aaa');
        $user->save();


    }
}
