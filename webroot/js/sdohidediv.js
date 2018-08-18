$(document).ready(function() 
{
    $('#sdoForm').hide(); 
    $('#village').change(function(){
        $('#sdoForm').find(':input').each(function () {
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
            $('#sdoForm').show(); 
        } else {
            $('#sdoForm').hide(); 
        } 
    });
    $('#subdistrict').change(function(){
        $('#sdoForm').hide(); 
    });
    $(".ref_yr").change(function(){
        if($(this).val()){
            alert ("Do you want to set/change this Year " + $(this).val() + " as Reference Year for this session");
        }

    });
});