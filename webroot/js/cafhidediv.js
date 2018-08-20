$(document).ready(function() 
{
    $('#cafForm').hide(); 
    $('#village').change(function(){
        console.log($(".ref_yr").val());
        $('#cafForm').find(':input').each(function () {
            switch (this.type) {
                case 'button':
                case 'text':
                case 'submit':
                case 'password':
                case 'file':
                case 'email':
                case 'date':
                case 'number':
                    $(this).val('');
                    break;
                case 'checkbox':
                case 'radio':
                    this.checked = false;
                    break;
            } });
        if($(this).val() && $(".ref_yr").val() ) {

            $('#cafForm').show(); 
        } 
        else{
            $('#cafForm').hide(); 
        }
            
        
    });
    $('#subdistrict').change(function(){
        $('#cafForm').hide(); 
    });
    $(".ref_yr").change(function(){
        if($(this).val()){
            alert ("Do you want to set/change this Year " + $(this).val() + " as Reference Year for this session");
        }

        $('#cafForm').find(':input').each(function () {
            switch (this.type) {
                case 'button':
                case 'text':
                case 'submit':
                case 'password':
                case 'file':
                case 'email':
                case 'date':
                case 'number':
                    $(this).val('');
                    break;
                case 'checkbox':
                case 'radio':
                    this.checked = false;
                    break;
            } });
        if($(this).val() ) {
            $('#cafForm').show(); 
        } else {
            $('#cafForm').hide(); 
        } 

    });
});