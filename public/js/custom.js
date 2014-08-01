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
       
       console.log(current_url.indexOf("?"));
       
       if (current_url.indexOf("?") > 0) {
           window.location.href = current_url + "&" + $(this).attr('type') + "=" + $(this).val();
       } else {
           window.location.href = current_url + "?" + $(this).attr('type') + "=" + $(this).val();
       }
   });
    
});