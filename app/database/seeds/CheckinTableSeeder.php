<?php
class CheckinTableSeeder extends Seeder {
    public function run()
    {
        DB::table('checkins')->delete();
        
        Checkin::create(array(
            'task_id'       =>  1,
            'start'         =>  time() - 3600,
            'end'           => time()
        ));
    }
}