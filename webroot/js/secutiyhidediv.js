$(document).ready(function() 
{
    $('#securityForm').hide(); 
    $('#village').change(function(){
        $('#securityForm').find(':input').each(function () {
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
            $('#securityForm').show(); 
        } else {
            $('#securityForm').hide(); 
        } 
    });
    $('#subdistrict').change(function(){
        $('#securityForm').hide(); 
    });
});