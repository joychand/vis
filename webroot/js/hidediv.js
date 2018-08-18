$(document).ready(function() 
{
    $('#anganwadiForm').hide(); 
    $('#village').change(function(){
        $('#anganwadiForm').find(':input').each(function () {
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
            $('#anganwadiForm').show(); 
        } else {
            $('#anganwadiForm').hide(); 
        } 
    });
    $('#subdistrict').change(function(){
        $('#anganwadiForm').hide(); 
    });

    $(".ref_yr").change(function(){
        if($(this).val()){
            alert ("Do you want to set/change this Year " + $(this).val() + " as Reference Year for this session");
        }

    });
});