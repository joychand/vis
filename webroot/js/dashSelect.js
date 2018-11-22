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
        var delay=3000;
        $('#villageprofile').hide();
        $('.loaderimage').show();
        if($(this).val() ) 
        {
            var village_code=$(this).val();
            var targeturl=$(this).attr('rel');
            var csrfToken=$('input[name^="_csrfToken"]').val();
            $.ajax({
                type:'post',
                url:"ajaxGetVillageProfile.json",
              // url:targeturl,   
                async:true,
                data: {"village_code":village_code},
                // contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                beforeSend: function(xhr){
                    xhr.setRequestHeader('X-CSRF-Token', csrfToken);
                   // console.log($('input[name^="_csrfToken"]').val());
                   
                    },
                success:function(response){
                   
                  // setTimeout(function () {
                    $("#vill_health_centre").html((response.vill_health!=undefined || response.vill_health!=null) ? response.vill_health.name_of_health_centre : '0' ); 
                    $("#asha_mobile").html((response.vill_health!=undefined || response.vill_health!=null) ? response.vill_health.asha_mobile : '0' );
                    $("#gtv_population").html((response.village_gtv!=undefined || response.village_gtv!=null) ? response.village_gtv.total_population : '0' );
                    $("#gtv_household").html((response.village_gtv!=undefined || response.village_gtv!=null) ? response.village_gtv.total_household : '0'); 
                    $("#school").html((response.vill_edn!=undefined || response.vill_edn!=null) ? response.vill_edn.total_govt_school + response.vill_edn.total_adc_school + response.vill_edn.total_adc_school : '0');
                    $("#student").html((response.vill_edn!=undefined || response.vill_edn!=null) ? (response.vill_edn.total_primary_student  + response.vill_edn.total_jhs_student + response.vill_edn.total_secondary_student ) : '0');           
                    $("#ang_worker").html((response.vill_anganwadi!=undefined || response.vill_anganwadi!=null) ? response.vill_anganwadi.total_anganwadi_worker : '0' );
                    $("#ang_children").html((response.vill_anganwadi!=undefined || response.vill_anganwadi!=null) ? response.vill_anganwadi.total_enrolled_children : '0' );
                    $("#nsap_benef").html((response.vill_nsap!=undefined || response.vill_nsap!=null) ? response.vill_nsap.total_widows_beneficiary + response.vill_nsap.total_handicap_beneficiary + response.vill_nsap.total_ignoaps_beneficiary : '0' );
                    $("#jobcard").html((response.vill_nrega!=undefined || response.vill_nrega!=null) ? response.vill_nrega.total_job_card : '0' );
                    $("#rationcard").html((response.vill_cafpd!=undefined || response.vill_cafpd!=null) ? response.vill_cafpd.total_aay_card + response.vill_cafpd.total_phh_card: '0' ); 
                    $("#voters").html((response.vill_electoral!=undefined || response.vill_electoral!=null) ? response.vill_electoral.electoral_total_voter : '0' );
                    $("#election_household").html((response.vill_electoral!=undefined || response.vill_electoral!=null) ? response.vill_electoral.electoral_total_household : '0' ); 
                   //*********modal start***************//
                   //***********gtv *****************/
                    $("#gtv_refyr").html((response.village_gtv!=undefined || response.village_gtv!=null) ? response.village_gtv.reference_year : '0' );
                    $("#gtv_hh").html((response.village_gtv!=undefined || response.village_gtv!=null) ? response.village_gtv.total_household : '0' );
                    $("#gtv_pop").html((response.village_gtv!=undefined || response.village_gtv!=null) ? response.village_gtv.total_population : '0' );  
                     //***********securityReport ***********/
                     $("#secu_refyr").html((response.village_sec!=undefined || response.village_sec!=null) ? response.village_sec.reference_year : '0' );
                     $("#secu_hh").html((response.village_sec!=undefined || response.village_sec!=null) ? response.village_sec.total_household : '0' );
                     $("#secu_pop").html((response.village_sec!=undefined || response.village_sec!=null) ? response.village_sec.total_population : '0' );  
                      //***********NERCORMP ***********/
                      $("#nerc_refyr").html((response.village_nercormp!=undefined || response.village_nercormp!=null) ? response.village_nercormp.reference_year : '0' );
                      $("#nerc_hh").html((response.village_nercormp!=undefined || response.village_nercormp!=null) ? response.village_nercormp.total_household : '0' );
                      $("#nerc_pop").html((response.village_nercormp!=undefined || response.village_nercormp!=null) ? response.village_nercormp.total_population : '0' );  
                       //***********Health ***********/
                       $("#health_refyr").html((response.vill_health!=undefined || response.vill_health!=null) ? response.vill_health.health_reference_year : '0' );
                       $("#health_centre").html((response.vill_health!=undefined || response.vill_health!=null) ? response.vill_health.name_of_health_centre : '0' );
                       $("#health_doctors").html((response.vill_health!=undefined || response.vill_health!=null) ? response.vill_health.no_of_doctors : '0' );  
                       $("#health_anm").html((response.vill_health!=undefined || response.vill_health!=null) ? response.vill_health.no_of_anm : '0' );
                       $("#health_nurse").html((response.vill_health!=undefined || response.vill_health!=null) ? response.vill_health.no_of_staff_nurse : '0' );
                       $("#health_asha").html((response.vill_health!=undefined || response.vill_health!=null) ? response.vill_health.no_of_asha : '0' );  
                       $("#health_no").html((response.vill_health!=undefined || response.vill_health!=null) ? response.vill_health.asha_mobile : '0' );  
                        //***********Education ***********/
                        $("#edn_refyr").html((response.vill_edn!=undefined || response.vill_edn!=null) ? response.vill_edn.education_reference_year : '0' );
                        $("#govt").html((response.vill_edn!=undefined || response.vill_edn!=null) ? response.vill_edn.total_govt_school : '0' );
                        $("#adc").html((response.vill_edn!=undefined || response.vill_edn!=null) ? response.vill_edn.total_adc_school : '0' );  
                        $("#private").html((response.vill_edn!=undefined || response.vill_edn!=null) ? response.vill_edn.total_private_school : '0' );
                        $("#prim_student").html((response.vill_edn!=undefined || response.vill_edn!=null) ? response.vill_edn.total_primary_student : '0' );
                        $("#prim_teach").html((response.vill_edn!=undefined || response.vill_edn!=null) ? response.vill_edn.total_primary_teacher : '0' );  
                        $("#jhs_student").html((response.vill_edn!=undefined || response.vill_edn!=null) ? response.vill_edn.total_jhs_student : '0' ); 
                        $("#jhs_teach").html((response.vill_edn!=undefined || response.vill_edn!=null) ? response.vill_edn.total_jhs_teacher : '0' );
                        $("#sec_student").html((response.vill_edn!=undefined || response.vill_edn!=null) ? response.vill_edn.total_secondary_student : '0' );
                        $("#sec_teach").html((response.vill_edn!=undefined || response.vill_edn!=null) ? response.vill_edn.total_secondary_teacher : '0' );  
                          //***********Anganwadis ***********/
                          $("#ang_refyr").html((response.vill_anganwadi!=undefined || response.vill_anganwadi!=null) ? response.vill_anganwadi.anganwadi_reference_year : '0' );
                          $("#ang_centre").html((response.vill_anganwadi!=undefined || response.vill_anganwadi!=null) ? response.vill_anganwadi.total_anganwadi_centre : '0' );
                          $("#ang_childre").html((response.vill_anganwadi!=undefined || response.vill_anganwadi!=null) ? response.vill_anganwadi.total_enrolled_children : '0' );  
                          $("#ang_name").html((response.vill_anganwadi!=undefined || response.vill_anganwadi!=null) ? response.vill_anganwadi.anganwadi_worker_name : '0' );
                          $("#ang_contact").html((response.vill_anganwadi!=undefined || response.vill_anganwadi!=null) ? response.vill_anganwadi.worker_mobile : '0' );
                          $("#1st").html((response.vill_anganwadi!=undefined || response.vill_anganwadi!=null) ? response.vill_anganwadi.first_qtr_pregnant : '0' );  
                          $("#2nd").html((response.vill_anganwadi!=undefined || response.vill_anganwadi!=null) ? response.vill_anganwadi.second_qtr_pregnant : '0' ); 
                          $("#3rd").html((response.vill_anganwadi!=undefined || response.vill_anganwadi!=null) ? response.vill_anganwadi.third_qtr_pregnant : '0' );
                          //***********NSAP ***********/
                          $("#nsap_refyr").html((response.vill_nsap!=undefined || response.vill_nsap!=null) ? response.vill_nsap.reference_year : '0' );
                          $("#nsap_widows").html((response.vill_nsap!=undefined || response.vill_nsap!=null) ? response.vill_nsap.total_widows_beneficiary : '0' );
                          $("#nsap_difabled").html((response.vill_nsap!=undefined || response.vill_nsap!=null) ? response.vill_nsap.total_handicap_beneficiary : '0' );  
                          $("#nsap_ignoaps").html((response.vill_nsap!=undefined || response.vill_nsap!=null) ? response.vill_nsap.total_ignoaps_beneficiary : '0' );
                          
                           //***********NREGA ***********/
                           $("#nrega_refyr").html((response.vill_nrega!=undefined || response.vill_nrega!=null) ? response.vill_nrega.nrega_reference_year : '0' );
                           $("#nrega_job").html((response.vill_nrega!=undefined || response.vill_nrega!=null) ? response.vill_nrega.total_job_card : '0' );
                           
                           //***********cafpd ***********/
                            $("#cafd_refyr").html((response.vill_cafpd!=undefined || response.vill_cafpd!=null) ? response.vill_cafpd.reference_year : '0' );
                            $("#cafd_aay").html((response.vill_cafpd!=undefined || response.vill_cafpd!=null) ? response.vill_cafpd.total_aay_card : '0' );
                            $("#cafd_amember").html((response.vill_cafpd!=undefined || response.vill_cafpd!=null) ? response.vill_cafpd.total_aay_members : '0' );
                            $("#cafd_phh").html((response.vill_cafpd!=undefined || response.vill_cafpd!=null) ? response.vill_cafpd.total_phh_card : '0' );
                            $("#cafd_pmember").html((response.vill_cafpd!=undefined || response.vill_cafpd!=null) ? response.vill_cafpd.total_phh_members : '0' );
                            $("#cafd_shop").html((response.vill_cafpd!=undefined || response.vill_cafpd!=null) ? response.vill_cafpd.fair_price_shop_name : '0' );
                            //********Election */
                            $("#election_RefYr").html((response.vill_electoral!=undefined || response.vill_electoral!=null) ? response.vill_electoral.reference_year : '0' );
                            $("#election_voter").html((response.vill_electoral!=undefined || response.vill_electoral!=null) ? response.vill_electoral.electoral_total_voter : '0' );
                            $("#household_election").html((response.vill_electoral!=undefined || response.vill_electoral!=null) ? response.vill_electoral.electoral_total_household : '-no Record-' );
                            $(".village_name").html(response.village.village_name);
                  // },delay);
                   
                     $('.loaderimage').hide();
                    $('#villageprofile').show(); 
                   // $(".village").val($(this).val()); 
                },
                error: function(e){
                    $('.loaderimage').hide();
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
