<?php
class TaskTableSeeder extends Seeder {
    public function run()
    {
        DB::table('tasks')->delete();
        
        Task::create(array(
            'description'       =>  'I am task one',
            'user_id'           =>  2,
            'project_id'        =>  1,
            'start_date'        =>  '2014-06-27',
            'end_date'          =>  '',
            'status'            =>  'in progress'
        ));
        
        Task::create(array(
            'description'       =>  'I am task two',
            'user_id'           =>  2,
            'project_id'        =>  1,
            'start_date'        =>  '2014-06-27',
            'end_date'          =>  '2014-06-27',
            'status'            =>  'completed'
        ));
        
        Task::create(array(
            'description'       =>  'I am task one',
            'user_id'           =>  2,
            'project_id'        =>  2,
            'status'            =>  'todo'
        ));
    }
}