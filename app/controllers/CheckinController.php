<?php

class CheckinController extends BaseController {
    public function startCheckin($task_id)
    {
        // insert new checkin
        $checkin = new Checkin;
        $checkin->start_date = date("Y-m-d");
        $checkin->task_id = $task_id;
        $checkin->start = time();
        
        $checkin->save();
        
        // return the checkin ID and insert into the <span> element as checkin_id attribute
        echo $checkin->id;
    }
    
    public function endCheckin($id)
    {
        // add end time
        $checkin = Checkin::find($id);
        $checkin->end = time();
        $checkin->save();
    }
}