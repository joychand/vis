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
            $(':input','#schemeForm')
            .not(':button, :submit, :reset, :hidden')
            .val('')
            .prop('checked', false)
            .prop('selected', false);    
        
        if($(this).val() ) {
            $('#schemeForm').show(); 
        } else {
            $('#schemeForm').hide(); 
        } 
    });
    $('#subdistrict').change(function(){
        $('#schemeForm').hide(); 
    });
    $(".ref_yr").change(function(){
        if($(this).val()){
            alert ("Do you want to set/change this Year " + $(this).val() + " as Reference Year for this session");
        }

    });
    
});