$(document).ready(function() 
{
    $('#schemeForm').hide(); 
    $('#village').change(function(){
        $('#schemeForm').find(':input').each(function () {
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
            $('#schemeForm').show(); 
        } else {
            $('#schemeForm').hide(); 
        } 
    });
    $('#subdistrict').change(function(){
        $('#schemeForm').hide(); 
    });
    
});