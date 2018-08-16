$(document).ready(function()
{
    $('#subdistrict').change(function(){
        var targeturl=$(this).attr('rel');
        var csrfToken=$('input[name^="_csrfToken"]').val();
        if( $(this).val())
        {
                var subdistrict_code=$(this).val();
                //alert(subdistrict_code);
                $.ajax({
                    type:'post',
                    url: targeturl,
                    async:true,
                    data: {"subdistrict_code":subdistrict_code},
                    contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                    beforeSend: function(xhr){
                        xhr.setRequestHeader('X-CSRF-Token', csrfToken);
                        console.log($('input[name^="_csrfToken"]').val());
                       //console.log(<?php echo json_encode($this->request->getParam('_csrfToken')); ?>);
                        },
                    success:function(response){
                                $("#village").empty();
                                $('<option>').val('').text('Select a Village').appendTo($("#village"));
                            console.log(response);
                                    $.each(response, function(key, value) {
                                        
                                
                                    $('<option>').val(key).text(value).appendTo($("#village"));
                                    });
                        },
                            
                    
                    
                    error: function(e){
                        alert("An error occured:" + e.responseText.message);
                        console.log(e);
                    }
                });
        }

        else {
            $("#village").empty();
            $('<option>').val('').text('Select a Village').appendTo($("#village"));
        }
       

    });

});
