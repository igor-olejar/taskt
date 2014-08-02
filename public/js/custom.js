/* Custom javascript tweaks */
$(document).ready(function(){
    
   $('.delete-link').click(function(e){
       e.preventDefault();
       
       if (confirm("Are you sure you want to delete this?")) {
           window.location.href = $(this).attr('href');
       }
   }); 
   
   $('.filter').change(function(){
       var current_url = window.location.href;
       
       if (current_url.indexOf("?") > 0) {
           window.location.href = current_url + "&" + $(this).attr('type') + "=" + $(this).val();
       } else {
           window.location.href = current_url + "?" + $(this).attr('type') + "=" + $(this).val();
       }
   });
   
   $('#clear-filters').click(function(){
       window.location.href = '/tasks';
   });
   
   $('.glyphicon-play').click(function(){
       
       // get task id
       var task_id = $(this).attr('task_id');
       
       // togle the class that shows either play or pause button
       $(this).toggleClass('glyphicon-pause');
       
       // stopping the checkin
       if ($(this).hasClass('glyphicon-play') && !$(this).hasClass('glyphicon-pause')) {
           var request = $.ajax({
               url:     "checkin/" + $(this).attr('checkin_id') + "/end",
               type:    "post"
           });
       }
       
       // we are starting a checkin
       if ($(this).hasClass('glyphicon-pause')) {
           var request = $.ajax({
               url:     "checkin/" + task_id + "/start",
               type:    "post"
           });
           
           request.done(function(msg){
               $("#task_" + task_id).attr('checkin_id', msg);
           });
       }
   });
   
   $('.glyphicon-stop').click(function(){
       
   });
    
});