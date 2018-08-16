
$(document).ready(function() 
{
    $('#nercormpForm').hide(); 
    $('#village').change(function(){
        $('#nercormpForm').find(':input').each(function () {
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
            $('#nercormpForm').show(); 
        } else {
            $('#nercormpForm').hide(); 
        } 
    });
    $('#subdistrict').change(function(){
        $('#nercormpForm').hide(); 
    });
    
});