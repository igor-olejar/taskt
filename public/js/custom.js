/* Custom javascript tweaks */
$(document).ready(function(){
    
   $('.delete-link').click(function(e){
       e.preventDefault();
       
       if (confirm("Are you sure you want to delete this?")) {
           window.location.href = $(this).attr('href');
       }
   }); 
    
});