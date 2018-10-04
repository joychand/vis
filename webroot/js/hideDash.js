$(document).ready(function() 
{
    $('#villageprofile').hide(); 
    $('#village').change(function(){
       
       
        if($(this).val() ) {

            $('#villageprofile').show(); 
        } 
        else{
            $('#villageprofile').hide(); 
        }
            
        
    });

    $('#subdistrict').change(function(){
        $('#villageprofile').hide(); 
    });

    $('.village').change(function(){
       
       
        if($(this).val() ) {

            $('#villageprofile').show(); 
        } 
        else{
            $('#villageprofile').hide(); 
        }
            
        
    });

    $('.subdivision').change(function(){
        $('#villageprofile').hide(); 
    });
});