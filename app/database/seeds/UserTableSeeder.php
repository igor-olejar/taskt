<?php
class UserTableSeeder extends Seeder {
    public function run()
    {
        DB::table('users')->delete();
        
        User::create(array(
            'username'      =>  'igor',
            'password'      =>  Hash::make('password'),
            'firstname'     =>  'Igor',
            'lastname'      =>  'Olejar',
            'email'         =>  'igor.olejar@gmail.com',
            'company'       =>  'TeknoStan Limited'
        ));
    }
}