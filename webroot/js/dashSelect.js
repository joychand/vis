$(document).ready(function()
{
   $('#slick-demo').slick({
    autoplay: true,
    autoplaySpeed: 4000,
    arrows: false,
    centerMode: true,
    dots: true,
    fade: true,
    speed: 1000,
    swipeToSlide: true
   });
    $(".reveal").on("opened", function() {
        $("#slick-demo").slick("setPosition");
    }); 
    $('#villageprofile').hide();    
    $('#subdistrict').change(function(){
        var targeturl=$(this).attr('rel');
        var csrfToken=$('input[name^="_csrfToken"]').val();
        if( $(this).val())
        {
                var subdistrict_code=$(this).val();
               // $(".subdivision").val($(this).val());
                
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


    // $('.subdivision').change(function(){
    //     var targeturl=$(this).attr('rel');
    //     var csrfToken=$('input[name^="_csrfToken"]').val();
    //     if( $(this).val())
    //     {
    //             var subdistrict_code=$(this).val();
    //             //alert(subdistrict_code);
    //             $.ajax({
    //                 type:'post',
    //                 url: targeturl,
    //                 async:true,
    //                 data: {"subdistrict_code":subdistrict_code},
    //                 contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
    //                 beforeSend: function(xhr){
    //                     xhr.setRequestHeader('X-CSRF-Token', csrfToken);
    //                     console.log($('input[name^="_csrfToken"]').val());
                       
    //                     },
    //                 success:function(response){
    //                     var sortedVillage=[];             
    //                     $(".village").empty();
    //                      $.each(response, function(key, value) {                                                                  
    //                         $('<option>').val(key).text(value).appendTo($(".village"));
    //                     });

                        
    //                     sortedVillage=$(".village option");
    //                     sortedVillage.sort(function(a,b) 
    //                     {
    //                         if (a.text.toLowerCase() > b.text.toLowerCase()) return 1;
    //                         if (a.text.toLowerCase() < b.text.toLowerCase()) return -1;
    //                            return 0
    //                      })
    //                      $('.village')
    //                         .find('option')
    //                         .remove()
    //                         .end();
                        
    //                      $('<option>').val('').text('Select a Village').appendTo($(".village"));
    //                      $(".village").append( sortedVillage );
    //                      $(".village").val('');
                                                  
    //                     },
                            
                    
                    
    //                 error: function(e){
    //                     alert("An error occured:" + e.responseText.message);
    //                     console.log(e);
    //                 }
    //             });
    //     }

    //     else {
    //         $(".village").empty();
    //         $('<option>').val('').text('Select a Village').appendTo($(".village"));
    //     }
       

    // });

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
                    $("#vill_health_centre").html((response.vill_health!=undefined || response.vill_health!=null) ? response.vill_health.name_of_health_centre : '-no-record-' ); 
                    $("#asha_mobile").html((response.vill_health!=undefined || response.vill_health!=null) ? response.vill_health.asha_mobile : '-no-record-' );
                    $(".nerc_population").html((response.village_nercormp!=undefined || response.village_nercormp!=null) ? response.village_nercormp.total_population : '-no-record-' );
                    $(".nerc_household").html((response.village_nercormp!=undefined || response.village_nercormp!=null) ? response.village_nercormp.total_household : '-no-record-'); 
                    $("#school").html((response.vill_edn!=undefined || response.vill_edn!=null) ? response.vill_edn.total_govt_school + response.vill_edn.total_adc_school + response.vill_edn.total_adc_school : '-no-record-');
                    $("#student").html((response.vill_edn!=undefined || response.vill_edn!=null) ? (response.vill_edn.total_primary_student  + response.vill_edn.total_jhs_student + response.vill_edn.total_secondary_student ) : '-no-record-');           
                    $("#ang_worker").html((response.vill_anganwadi!=undefined || response.vill_anganwadi!=null) ? response.vill_anganwadi.total_anganwadi_worker : '-no-record-' );
                    $("#ang_children").html((response.vill_anganwadi!=undefined || response.vill_anganwadi!=null) ? response.vill_anganwadi.total_enrolled_children : '-no-record-' );
                    $("#nsap_benef").html((response.vill_nsap!=undefined || response.vill_nsap!=null) ? response.vill_nsap.total_widows_beneficiary + response.vill_nsap.total_handicap_beneficiary + response.vill_nsap.total_ignoaps_beneficiary : '-no-record-' );
                    $("#jobcard").html((response.vill_nrega!=undefined || response.vill_nrega!=null) ? response.vill_nrega.total_job_card : '-no-record-' );
                    $("#rationcard").html((response.vill_cafpd!=undefined || response.vill_cafpd!=null) ? response.vill_cafpd.total_aay_card + response.vill_cafpd.total_phh_card: '-no-record-' ); 
                    $("#voters").html((response.vill_electoral!=undefined || response.vill_electoral!=null) ? response.vill_electoral.electoral_total_voter : '-no-record-' );
                    $("#election_household").html((response.vill_electoral!=undefined || response.vill_electoral!=null) ? response.vill_electoral.electoral_total_household : '-no-record-' ); 
                   //*********modal start***************//
                   //***********gtv *****************/
                    $("#gtv_refyr").html((response.village_gtv!=undefined || response.village_gtv!=null) ? response.village_gtv.reference_year : '-no-record-' );
                    $("#gtv_hh").html((response.village_gtv!=undefined || response.village_gtv!=null) ? response.village_gtv.total_household : '-no-record-' );
                    $("#gtv_pop").html((response.village_gtv!=undefined || response.village_gtv!=null) ? response.village_gtv.total_population : '-no-record-' );  
                     //***********securityReport ***********/
                     $("#secu_refyr").html((response.village_sec!=undefined || response.village_sec!=null) ? response.village_sec.reference_year : '-no-record-' );
                     $("#secu_hh").html((response.village_sec!=undefined || response.village_sec!=null) ? response.village_sec.total_household : '-no-record-' );
                     $("#secu_pop").html((response.village_sec!=undefined || response.village_sec!=null) ? response.village_sec.total_population : '-no-record-' );  
                      //***********NERCORMP ***********/
                      $("#nerc_refyr").html((response.village_nercormp!=undefined || response.village_nercormp!=null) ? response.village_nercormp.reference_year : '-no-record-' );
                      $("#nerc_hh").html((response.village_nercormp!=undefined || response.village_nercormp!=null) ? response.village_nercormp.total_household : '-no-record-' );
                      $("#nerc_pop").html((response.village_nercormp!=undefined || response.village_nercormp!=null) ? response.village_nercormp.total_population : '-no-record-' ); 
                      //**********CENSUS****  ***/ 
                      $("#cen_refyr").html((response.village_census!=undefined || response.village_census!=null) ? response.village_census.reference_year : '-no-record-' );
                      $("#cen_hh").html((response.village_census!=undefined || response.village_census!=null) ? response.village_census.total_household : '-no-record-' );
                      $("#cen_pop").html((response.village_census!=undefined || response.village_census!=null) ? response.village_census.total_population : '-no-record-' ); 
                       //**********HILLHOUSE TAX****  ***/ 
                       $("#hht_refyr").html((response.village_hillhouse!=undefined || response.village_hillhouse!=null) ? response.village_hillhouse.reference_year : '-no-record-' );
                       $("#hht_hh").html((response.village_hillhouse!=undefined || response.village_hillhouse!=null) ? response.village_hillhouse.total_household : '-no-record-' );
                       $("#hht_pop").html((response.village_hillhouse!=undefined || response.village_hillhouse!=null) ? response.village_hillhouse.total_population : '-no-record-' ); 

                       //***********Health ***********/
                       $("#health_refyr").html((response.vill_health!=undefined || response.vill_health!=null) ? response.vill_health.health_reference_year : '-no-record-' );
                       $("#health_centre").html((response.vill_health!=undefined || response.vill_health!=null) ? response.vill_health.name_of_health_centre : '-no-record-' );
                       $("#health_doctors").html((response.vill_health!=undefined || response.vill_health!=null) ? response.vill_health.no_of_doctors : '-no-record-' );  
                       $("#health_anm").html((response.vill_health!=undefined || response.vill_health!=null) ? response.vill_health.no_of_anm : '-no-record-' );
                       $("#health_nurse").html((response.vill_health!=undefined || response.vill_health!=null) ? response.vill_health.no_of_staff_nurse : '-no-record-' );
                       $("#health_asha").html((response.vill_health!=undefined || response.vill_health!=null) ? response.vill_health.no_of_asha : '-no-record-' );  
                       $("#health_no").html((response.vill_health!=undefined || response.vill_health!=null) ? response.vill_health.asha_mobile : '-no-record-' );  
                        //***********Education ***********/
                        $("#edn_refyr").html((response.vill_edn!=undefined || response.vill_edn!=null) ? response.vill_edn.education_reference_year : '-no-record-' );
                        $("#govt").html((response.vill_edn!=undefined || response.vill_edn!=null) ? response.vill_edn.total_govt_school : '-no-record-' );
                        $("#adc").html((response.vill_edn!=undefined || response.vill_edn!=null) ? response.vill_edn.total_adc_school : '-no-record-' );  
                        $("#private").html((response.vill_edn!=undefined || response.vill_edn!=null) ? response.vill_edn.total_private_school : '-no-record-' );
                        $("#prim_student").html((response.vill_edn!=undefined || response.vill_edn!=null) ? response.vill_edn.total_primary_student : '-no-record-' );
                        $("#prim_teach").html((response.vill_edn!=undefined || response.vill_edn!=null) ? response.vill_edn.total_primary_teacher : '-no-record-' );  
                        $("#jhs_student").html((response.vill_edn!=undefined || response.vill_edn!=null) ? response.vill_edn.total_jhs_student : '-no-record-' ); 
                        $("#jhs_teach").html((response.vill_edn!=undefined || response.vill_edn!=null) ? response.vill_edn.total_jhs_teacher : '-no-record-' );
                        $("#sec_student").html((response.vill_edn!=undefined || response.vill_edn!=null) ? response.vill_edn.total_secondary_student : '-no-record-' );
                        $("#sec_teach").html((response.vill_edn!=undefined || response.vill_edn!=null) ? response.vill_edn.total_secondary_teacher : '-no-record-' );  
                          //***********Anganwadis ***********/
                          $("#ang_refyr").html((response.vill_anganwadi!=undefined || response.vill_anganwadi!=null) ? response.vill_anganwadi.anganwadi_reference_year : '-no-record-' );
                          $("#ang_centre").html((response.vill_anganwadi!=undefined || response.vill_anganwadi!=null) ? response.vill_anganwadi.total_anganwadi_centre : '-no-record-' );
                          $("#ang_childre").html((response.vill_anganwadi!=undefined || response.vill_anganwadi!=null) ? response.vill_anganwadi.total_enrolled_children : '-no-record-' );  
                          $("#ang_name").html((response.vill_anganwadi!=undefined || response.vill_anganwadi!=null) ? response.vill_anganwadi.anganwadi_worker_name : '-no-record-' );
                          $("#ang_contact").html((response.vill_anganwadi!=undefined || response.vill_anganwadi!=null) ? response.vill_anganwadi.worker_mobile : '-no-record-' );
                          $("#1st").html((response.vill_anganwadi!=undefined || response.vill_anganwadi!=null) ? response.vill_anganwadi.first_qtr_pregnant : '-no-record-' );  
                          $("#2nd").html((response.vill_anganwadi!=undefined || response.vill_anganwadi!=null) ? response.vill_anganwadi.second_qtr_pregnant : '-no-record-' ); 
                          $("#3rd").html((response.vill_anganwadi!=undefined || response.vill_anganwadi!=null) ? response.vill_anganwadi.third_qtr_pregnant : '-no-record-' );
                          //***********NSAP ***********/
                          $("#nsap_refyr").html((response.vill_nsap!=undefined || response.vill_nsap!=null) ? response.vill_nsap.reference_year : '-no-record-' );
                          $("#nsap_widows").html((response.vill_nsap!=undefined || response.vill_nsap!=null) ? response.vill_nsap.total_widows_beneficiary : '-no-record-' );
                          $("#nsap_difabled").html((response.vill_nsap!=undefined || response.vill_nsap!=null) ? response.vill_nsap.total_handicap_beneficiary : '-no-record-' );  
                          $("#nsap_ignoaps").html((response.vill_nsap!=undefined || response.vill_nsap!=null) ? response.vill_nsap.total_ignoaps_beneficiary : '-no-record-' );
                          
                           //***********NREGA ***********/
                           $("#nrega_refyr").html((response.vill_nrega!=undefined || response.vill_nrega!=null) ? response.vill_nrega.nrega_reference_year : '-no-record-' );
                           $("#nrega_job").html((response.vill_nrega!=undefined || response.vill_nrega!=null) ? response.vill_nrega.total_job_card : '-no-record-' );
                           
                           //***********cafpd ***********/
                            $("#cafd_refyr").html((response.vill_cafpd!=undefined || response.vill_cafpd!=null) ? response.vill_cafpd.reference_year : '-no-record-' );
                            $("#cafd_aay").html((response.vill_cafpd!=undefined || response.vill_cafpd!=null) ? response.vill_cafpd.total_aay_card : '-no-record-' );
                            $("#cafd_amember").html((response.vill_cafpd!=undefined || response.vill_cafpd!=null) ? response.vill_cafpd.total_aay_members : '-no-record-' );
                            $("#cafd_phh").html((response.vill_cafpd!=undefined || response.vill_cafpd!=null) ? response.vill_cafpd.total_phh_card : '-no-record-' );
                            $("#cafd_pmember").html((response.vill_cafpd!=undefined || response.vill_cafpd!=null) ? response.vill_cafpd.total_phh_members : '-no-record-' );
                            $("#cafd_shop").html((response.vill_cafpd!=undefined || response.vill_cafpd!=null) ? response.vill_cafpd.fair_price_shop_name : '-no-record-' );
                            //********Election */
                            $("#election_RefYr").html((response.vill_electoral!=undefined || response.vill_electoral!=null) ? response.vill_electoral.reference_year : '-no-record-' );
                            $("#election_voter").html((response.vill_electoral!=undefined || response.vill_electoral!=null) ? response.vill_electoral.electoral_total_voter : '-no-record-' );
                            $("#household_election").html((response.vill_electoral!=undefined || response.vill_electoral!=null) ? response.vill_electoral.electoral_total_household : '-no Record-' );
                            $(".village_name").html(response.village.village_name);
                  // },delay);
                            //*****Village-photos */
                            if(response.village_photos!=undefined && response.village_photos!=null && response.village_photos.length>0)
                            {
                                $('.photo').each(function(){
                                    //Change the src of each img
                                    if(response.village_photos[0])
                                        {
                                            $('#photo1').attr('src', '/img/VillagePhotos/photo/'+response.village_photos[0].photo) 
                                        }
                                    else
                                        {
                                            $('#photo1').attr('src', '/img/VillagePhotos/photo/noimage.jpg');  
                                        }
                                   // $('#photo1').attr('src', '/img/VillagePhotos/photo/'+response.village_photos[0].photo);
                                    if(response.village_photos[1])
                                        {
                                            $('#photo2').attr('src', '/img/VillagePhotos/photo/'+response.village_photos[1].photo);  
                                        }
                                    else
                                        {
                                            $('#photo2').attr('src', '/img/VillagePhotos/photo/noimage.jpg');  
                                        }
                                        if(response.village_photos[2])
                                        {
                                            $('#photo3').attr('src', '/img/VillagePhotos/photo/'+response.village_photos[2].photo);  
                                        }
                                    else
                                        {
                                            $('#photo3').attr('src', '/img/VillagePhotos/photo/noimage.jpg');  
                                        }
                              });
                            }
                            else 
                            {
                                $('.photo').each(function(){
                                    //Change the src of each img
                                    $(this).attr('src', '/img/VillagePhotos/photo/noimage.jpg');
                              });
                            }
                           // $("#election_RefYr").html((response.village_photos!=undefined || response.village_photos!=null) ? response.vill_electoral.reference_year : '-no-record-' );
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
            $("#village").val('');
        }
            
        
    });

    $('#subdistrict').change(function(){
        $('#villageprofile').hide(); 
    });

    // $('.village').change(function(){
       
       
    //     if($(this).val() ) {

    //         $('#villageprofile').show(); 
    //     } 
    //     else{
    //         $('#villageprofile').hide(); 
    //     }
            
        
    // });

    // $('.subdivision').change(function(){
    //     $('#villageprofile').hide(); 
    // });

});
