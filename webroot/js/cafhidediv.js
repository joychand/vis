$(document).ready(function() 
{
    $('#cafForm').hide(); 
    $('#village').change(function(){
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
    $('#subdistrict').change(function(){
        $('#cafForm').hide(); 
    });
});