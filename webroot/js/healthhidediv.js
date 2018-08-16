$(document).ready(function() 
{
    $('#healthForm').hide(); 
    $('#village').change(function(){
        $('#healthForm').find(':input').each(function () {
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
            $('#healthForm').show(); 
        } else {
            $('#healthForm').hide(); 
        } 
    });
    $('#subdistrict').change(function(){
        $('#healthForm').hide(); 
    });
    
});