<?php
class ProjectUserTableSeeder extends Seeder {
    public function run()
    {
        DB::table('project_user')->delete();
        
        ProjectUser::create(array(
            'user_id'       =>  2,
            'project_id'    =>  1
        ));
        
        ProjectUser::create(array(
            'user_id'       =>  2,
            'project_id'    =>  2
        ));
    }
}