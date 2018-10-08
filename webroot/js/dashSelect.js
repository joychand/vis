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

   //********** get village profile ***************//
    $('#village').change(function(){
       
       
        if($(this).val() ) 
        {
            var village_code=$(this).val();
            var targeturl=$(this).attr('rel');
            var csrfToken=$('input[name^="_csrfToken"]').val();
            $.ajax({
                type:'post',
                url:"villageprofile/ajaxGetVillageProfile.json",
                async:true,
                data: {"village_code":village_code},
                // contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                beforeSend: function(xhr){
                    xhr.setRequestHeader('X-CSRF-Token', csrfToken);
                   // console.log($('input[name^="_csrfToken"]').val());
                   
                    },
                success:function(response){
                    $("#vill_health_centre").html((response.vill_health!=undefined || response.vill_health!=null) ? response.vill_health.name_of_health_centre : '-no-data-' ); 
                    $("#asha_mobile").html((response.vill_health!=undefined || response.vill_health!=null) ? response.vill_health.asha_mobile : '-no-data-' );
                    $("#gtv_population").html((response.village_gtv!=undefined || response.village_gtv!=null) ? response.village_gtv.total_population : '-no-data-' );
                    $("#gtv_household").html((response.village_gtv!=undefined || response.village_gtv!=null) ? response.village_gtv.total_household : '-no-data-'); 
                    $("#school").html((response.vill_edn!=undefined || response.vill_edn!=null) ? response.vill_edn.total_govt_school + response.vill_edn.total_adc_school + response.vill_edn.total_adc_school : '-no-data-');
                    $("#student").html((response.vill_edn!=undefined || response.vill_edn!=null) ? response.vill_edn.total_primary_student + response.vill_edn.total_primary_student + response.vill_edn.total_jhs_student + response.vill_edn.total_secondary_student + response.vill_edn.total_hrsec_student : '-no-data-');           
                    $("#ang_worker").html((response.vill_anganwadi!=undefined || response.vill_anganwadi!=null) ? response.vill_anganwadi.total_anganwadi_worker : '-no-data-' );
                    $("#ang_children").html((response.vill_anganwadi!=undefined || response.vill_anganwadi!=null) ? response.vill_anganwadi.total_enrolled_children : '-no-data-' );
                    $("#nsap_benef").html((response.vill_nsap!=undefined || response.vill_nsap!=null) ? response.vill_nsap.total_widows_beneficiary + response.vill_nsap.total_handicap_beneficiary + response.vill_nsap.total_ignoaps_beneficiary : '-no-data-' );
                    $("#jobcard").html((response.vill_nrega!=undefined || response.vill_nrega!=null) ? response.vill_nrega.total_job_card : '-no-data-' );
                    $("#rationcard").html((response.vill_cafpd!=undefined || response.vill_cafpd!=null) ? response.vill_cafpd.total_aay_card + response.vill_cafpd.total_phh_card: '-no-data-' ); 
                    $("#voters").html((response.vill_electoral!=undefined || response.vill_electoral!=null) ? response.vill_electoral.electoral_total_voter : '-no-data-' );
                    $("#election_household").html((response.vill_electoral!=undefined || response.vill_electoral!=null) ? response.vill_electoral.electoral_total_household : '-no-data-' ); 
                    $('#villageprofile').show(); 
                   // $(".village").val($(this).val()); 
                },
                error: function(e){
                    alert("An error occured:" + e.responseText.message);
                    console.log(e);
                }
            });


         
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
