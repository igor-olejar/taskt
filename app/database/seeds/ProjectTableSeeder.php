<?php
class ProjectTableSeeder extends Seeder {
    public function run()
    {
        DB::table('projects')->delete();
        
        Project::create(array(
            'name'          =>  'Project1',
            'description'   =>  'I am the first project ever',
            'client'        =>  1,
            'start_date'    =>  '2014-06-12',
            'end_date'      =>  '2014-07-12'
        ));
        
        Project::create(array(
            'name'          =>  'Project2',
            'description'   =>  'I am the second project',
            'client'        =>  1,
            'start_date'    =>  '2014-06-10',
            'end_date'      =>  '2015-07-10'
        ));
    }
}