$(document).ready(function()
{
    $('#villageprofile').hide(); 
    $('#subdistrict').change(function(){
        var targeturl=$(this).attr('rel');
        var csrfToken=$('input[name^="_csrfToken"]').val();
        if( $(this).val())
        {
                var subdistrict_code=$(this).val();
                $(".subdivision").val($(this).val());
                
                $.ajax({
                    type:'post',
                    url: targeturl,
                    async:true,
                    data: {"subdistrict_code":subdistrict_code},
                    contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                    beforeSend: function(xhr){
                        xhr.setRequestHeader('X-CSRF-Token', csrfToken);
                        console.log($('input[name^="_csrfToken"]').val());
                       
                        },
                    success:function(response){
                        var sortedVillage=[];             
                        $("#village").empty();
                         $.each(response, function(key, value) {                                                                  
                            $('<option>').val(key).text(value).appendTo($("#village"));
                        });

                        
                        sortedVillage=$("#village option");
                        sortedVillage.sort(function(a,b) 
                        {
                            if (a.text.toLowerCase() > b.text.toLowerCase()) return 1;
                            if (a.text.toLowerCase() < b.text.toLowerCase()) return -1;
                               return 0
                         })
                         $('#village')
                            .find('option')
                            .remove()
                            .end();
                        
                         $('<option>').val('').text('Select a Village').appendTo($("#village"));
                         $("#village").append( sortedVillage );
                         $("#village").val('');
                                                  
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


    $('.subdivision').change(function(){
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
                       
                        },
                    success:function(response){
                        var sortedVillage=[];             
                        $(".village").empty();
                         $.each(response, function(key, value) {                                                                  
                            $('<option>').val(key).text(value).appendTo($(".village"));
                        });

                        
                        sortedVillage=$(".village option");
                        sortedVillage.sort(function(a,b) 
                        {
                            if (a.text.toLowerCase() > b.text.toLowerCase()) return 1;
                            if (a.text.toLowerCase() < b.text.toLowerCase()) return -1;
                               return 0
                         })
                         $('.village')
                            .find('option')
                            .remove()
                            .end();
                        
                         $('<option>').val('').text('Select a Village').appendTo($(".village"));
                         $(".village").append( sortedVillage );
                         $(".village").val('');
                                                  
                        },
                            
                    
                    
                    error: function(e){
                        alert("An error occured:" + e.responseText.message);
                        console.log(e);
                    }
                });
        }

        else {
            $(".village").empty();
            $('<option>').val('').text('Select a Village').appendTo($(".village"));
        }
       

    });

   //********** hide and show village profile ***************//
    $('#village').change(function(){
       
       
        if($(this).val() ) {

            $('#villageprofile').show(); 
            $(".village").val($(this).val());
        } 
        else{
            $('#villageprofile').hide(); 
            $(".village").val('');
        }
            
        
    });

    $('#subdistrict').change(function(){
        $('#villageprofile').hide(); 
    });

    $('.village').change(function(){
       
       
        if($(this).val() ) {

            $('#villageprofile').show(); 
        } 
        else{
            $('#villageprofile').hide(); 
        }
            
        
    });

    $('.subdivision').change(function(){
        $('#villageprofile').hide(); 
    });

});
