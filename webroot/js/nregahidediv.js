$(document).ready(function() 
{
    $('#nregaForm').hide(); 
    $('#village').change(function(){
        $('#nregaForm').find(':input').each(function () {
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
            $('#nregaForm').show(); 
        } else {
            $('#nregaForm').hide(); 
        } 
    });
    $('#subdistrict').change(function(){
        $('#nregaForm').hide(); 
    });
    
});