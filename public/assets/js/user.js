$(document).ready(function(){

  $( "#start_cloes").click(function() { //it will use to clear the form data while clicking close button
    location.reload(true);
   });

  $( "#cloes").click(function() { //it will use to clear the form data while clicking close button
    location.reload(true);
   });


  $('#user_search_submit').on('click',function(){

            alert("Hiii");

            
   });


  $(document).on("change",'#search_dropdown',function(){
    var select_value = $('#search_dropdown option:selected').val();
      //alert(select_value);
      
      if(select_value=='name'){
        $('#search').attr('placeholder','Search By name');
      }
      else if(select_value=='email'){
        $('#search').attr('placeholder','Search By email');
      }
      else if(select_value=='skills'){
        $('#search').attr('placeholder','Search By Skills');
      }
      else if(select_value=='job_location_id'){
        $('#search').attr('placeholder','Search By job location');
      }
      else{
        $('#search').attr('placeholder','');
      }
  });





   

    
});