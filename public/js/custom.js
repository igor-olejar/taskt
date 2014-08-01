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
       $(this).toggleClass('glyphicon-pause');
       
       if ($(this).hasClass('glyphicon-play') && !$(this).hasClass('glyphicon-pause')) {
           console.log('pause recording');
       }
       
       if ($(this).hasClass('glyphicon-pause')) {
           console.log('start recording');
       }
   });
   
   $('.glyphicon-stop').click(function(){
       
   });
    
});