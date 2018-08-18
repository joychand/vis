$(document).ready(function() 
{
    $('#eduForm').hide(); 
    $('#village').change(function(){
        $('#eduForm').find(':input').each(function () {
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
            $('#eduForm').show(); 
        } else {
            $('#eduForm').hide(); 
        } 
    });
    $('#subdistrict').change(function(){
        $('#eduForm').hide(); 
    });

    $(".ref_yr").change(function(){
        if($(this).val()){
            alert ("Do you want to set/change this Year " + $(this).val() + " as Reference Year for this session");
        }

    });
});