$(document).ready(function() 
{
    $('.data').hide(); 
    $('#village').change(function(){
        $('.data').find(':input').each(function () {
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
            $(':input','.data')
            .not(':button, :submit, :reset, :hidden')
            .val('')
            .prop('checked', false)
            .prop('selected', false);    
        
        if($(this).val() ) {
            $('.data').show(); 
        } else {
            $('.data').hide(); 
        } 
    });
    $('#subdistrict').change(function(){
        $('.data').hide(); 
    });
   
    
});