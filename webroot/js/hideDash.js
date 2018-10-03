$(document).ready(function() 
{
    $('#villageprofile').hide(); 
    $('#village').change(function(){
       
        // $('.dataForm').find(':input').each(function () {
        //     switch (this.type) {
        //         case 'button':
        //         case 'text':
        //         case 'submit':
        //         case 'password':
        //         case 'file':
        //         case 'email':
        //         case 'date':
        //         case 'number':
        //             $(this).val('');
        //             break;
        //         case 'checkbox':
        //         case 'radio':
        //             this.checked = false;
        //             break;
        //     } });
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
});