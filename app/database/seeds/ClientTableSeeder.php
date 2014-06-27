<?php
class ClientTableSeeder extends Seeder {
    public function run()
    {
        DB::table('clients')->delete();
        
        Client::create(array(
            "name"          =>  "Happy Company",
            "description"   =>  "We are very happy",
            "website"       =>  "http://www.happy.com",
        ));
        
        Client::create(array(
            "name"          =>  "Sad Company",
            "description"   =>  "We are very sad",
            "website"       =>  "http://www.sad.com",
        ));
        
        Client::create(array(
            "name"          =>  "Third Company",
            "description"   =>  "",
            "website"       =>  "",
        ));
    }
}