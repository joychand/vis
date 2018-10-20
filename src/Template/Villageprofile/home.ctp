<?php
    $this->layout = 'villageProfile';
    $cakeDescription = 'VIS:Village Information System, Chandel';
?>


<div class="container" style="padding:10px; padding-bottom:80px; ">
    
    <div class="large-6 medium-8 small-9 small-centered medium-centered large-centered columns">
        <?= $this->Form->create() ?>
        <?php $targetUrl = $this->Url->build(['action' => 'getvillage']); ?>
        <?php $profileUrl = $this->Url->build(['action' => 'ajaxGetVillageProfile']); ?>
        <!-- <div class="row"> -->
        <fieldset class = "fieldset" style="border: 1px solid #cacaca;  padding: 1.25rem;  margin: 1.125rem 0;">
            <!-- <fieldset style="padding:0 !important">     -->
                <legend><?= __('Select Village') ?></legend>        
                <form>
        <div class="row hide-for-small-only">
            <div class="medium-6 columns">
                <div class="row">
                    <div class="medium-4 columns">
                        <label for="right-label" class="right inline">Subdivision:</label>
                    </div>
                    <div class="medium-8 columns">                   
                         <?= $this->Form->control('subdistrict_code',['type'=>'select','label'=>false,'options'=>$subdivision,'empty'=>'Select SubDivision','id'=>'subdistrict','rel'=>$targetUrl,'required'=>true]) ?>
                    </div>
                </div>
            </div>
            <div class="medium-6 columns">
            <div class="row">
                <div class="medium-4 columns">
                <label for="right-label" class="right inline">Village:</label>
                </div>
                <div class="medium-8 columns">
                <?= $this->Form->control('village_code',['type'=>'select','label'=>false,'empty'=>'Select Village','id'=>'village','required'=>true, 'rel'=>$profileUrl]) ?> 
                </div>
            </div>
            </div>
        </div>

        <!-- </div> -->
        <div class="row show-for-small-only">
            <?= $this->Form->control('subdistrict_code',[ 'class'=>'subdivision','type'=>'select','label'=>'Subdivision:','options'=>$subdivision,'empty'=>'Select SubDivision','rel'=>$targetUrl,'required'=>true]) ?>
        </div>
        <div class="row show-for-small-only">
            <?= $this->Form->control('village_code',['class'=>'village','type'=>'select','label'=>'Village:','empty'=>'Select Village','required'=>true]) ?> 
        </div>
     </fieldset> 
         <!-- <?= $this->Form->button(__('Submit')) ?> -->
        <?= $this->Form->end() ?> 
    </div>
    <!-- <div class="row"> -->
    <div class="container  small-centered medium-centered large-centered"  id="villageprofile"style=" display:none !important;">
     
    <!-- ********************************************* DEMOGRAPHY********************************* -->
    <div class="large-4 medium-6 small-12  columns">
            <a class="dashboard-nav-card" href="#" style="background:chocolate !important;   background-clip:content-box!important;" data-open="demography">
            <!-- <i class="dashboard-nav-card-icon fi-torso large" aria-hidden="true"></i> -->
                <img  class="dashboard-nav-card-icon" src="/img/population.svg" style="width:130px;height:60px" alt="sdfd">
                <h3 class="dashboard-nav-card-title">Demography</h3>
                <div class="dashboard-nav-card-content">
                    <h6 class="dashboard-nav-card-kpi" >Total Population: <span id ="gtv_population"></span> </h6>
                     <h6 class="dashboard-nav-card-kpi" >Total Household:<span id ="gtv_household"></span> </h6>
                </div> 
                <img  class="dashboard-nav-card-more" src="/img/more.svg" style="width:80px;height:30px" alt="sdfd">
            </a>
            <div id="demography" class="large reveal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog" >
                <h2 id="modalTitle">Demography</h2>
                <div class="row">
                    <h6 style="color:#116d76">Village Name:<span class="village_name" style="color:#116d76"></span></h6>
                    <table class="responsive-card-table unstriped">
                        <thead>
                            <tr>
                            
                            <th>Agency</th>
                            <th>Ref. Yr.</th>
                            <th>Total Household</th>
                            <th>Total Population</th>
                            

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td data-label="Agency">GTV</td>
                            <td id="gtv_refyr" data-label="Ref.Yr."></td>
                            <td id="gtv_hh" data-label="Household"></td>
                            <td id="gtv_pop"data-label="Population"></td>
                            
                            </tr>
                            <tr>
                            <td data-label="Agency">Security Report</td>
                            <td id="secu_refyr" data-label="Ref.Yr."></td>
                            <td id="secu_hh" data-label="Household"></td>
                            <td id="secu_pop" data-label="Population"></td>
                            
                            </tr>
                            <tr>
                            <td  data-label="Agency">NERCORMP</td>
                            <td id="nerc_refyr" data-label="Ref.Yr."></td>
                            <td id="nerc_hh" data-label="Household"></td>
                            <td id="nerc_pop" data-label="Population"></td>
                            
                            </tr>
                            
                        </tbody>
                    </table>

                </div> <!-- end of row div -->
                <button class="close-button button tiny button alert" data-close aria-label="Close modal" type="button">
                         <span aria-hidden="true">&times;</span>
                </button>
            </div> <!-- end of demography modal div -->
        </div>  <!--********** end of DEMOGRAPHY  ******* -->    
    <!-- ****************************HEALTH INFRA DASH-BOARD CARD********************** -->
    <div class="large-4 medium-6 small-12  columns">
            <a class="dashboard-nav-card" href="#" style="background:navy !important;  background-clip:content-box!important;"  data-open="health">
                <!-- <i class="dashboard-nav-card-icon fi-torso large" aria-hidden="true"></i> -->
                <img  class="dashboard-nav-card-icon" src="/img/pharmacy.svg" style="width:130px;height:60px" alt="sdfd">
                <h3 class="dashboard-nav-card-title">Health Infra</h3>
                <div class="dashboard-nav-card-content">
                    <!-- <h6 class="dashboard-nav-card-kpi">Total Doctors: 2</h6> -->
                    <!-- <p class="dashboard-nav-card-kpi">CHC/PHC/PHSC:  <span class="dashboard-nav-card-kpi" style="font-size:1rem !important"><?= isset($vill_health->name_of_health_centre) ? $vill_health->name_of_health_centre :'-No Data-' ?><span></p> -->
                    <h6 class="dashboard-nav-card-kpi">CHC/PHC/PHSC:  <span class="dashboard-nav-card-kpi" id = "vill_health_centre" style="font-size:1rem !important"><span></h6>
                    <h6 class="dashboard-nav-card-kpi">ASHA(Mobile):   <span class="dashboard-nav-card-kpi" id = "asha_mobile" style="font-size:1rem !important"><?= isset($vill_health->asha_mobile) ? $vill_health->asha_mobile:'-No Data-' ?><span></h6>
                </div> 
                
                <img  class="dashboard-nav-card-more" src="/img/more.svg" style="width:80px;height:30px" alt="sdfd">
            </a>
            <div id="health" class="  large reveal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog" >
                <h2 id="modalTitle">Health Infra</h2>
                <!-- <a class="close-reveal-modal" style="top: 1.5rem !important;position: absolute !important;right: 1.5rem; !important;font-weight:bold !important;"aria-label="Close" data-close>&#215;</a> -->

                <div class="row">
                <h6 style="color:#116d76">Village Name:<span class="village_name" style="color:#116d76"></span></h6>
                    <table class="responsive-card-table unstriped">
                        <thead>
                            <tr>
                            <th>Ref. Yr.:</th>
                            <th>CHC/PHC/PHSC Name:</th>
                            <th>No. of Doctors:</th>
                            <th>No. of ANM:</th>
                            <th>No. of Staff Nurse:</th>
                            <th>No. of ASHA Worker:</th>
                            <th> ASHA Contact:</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td  id="health_refyr" data-label="Ref.Yr."></td>
                                <td id="health_centre" data-label="CHC/PHC/PHSC"><</td>
                                <td id="health_doctors" data-label="Doctors"></td>
                                <td id="health_anm" data-label="ANM"></td>
                                <td id="health_nurse" data-label="Staff Nurse"></td>
                                <td id="health_asha" data-label="ASHA"></td>
                                <td id="health_no" data-label="Contact(ASHA)"></td>
                            </tr>

                        </tbody>
                    </table>

                </div>
                <button class="close-button button tiny button alert" data-close aria-label="Close modal" type="button">
                         <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div><!-- *****END OF HEALTH*** -->

 <!-- ****************************EDUCATION INFRA DASH-BOARD CARD********************** -->
        <div class="large-4 medium-6 small-12  columns">
            <a class="dashboard-nav-card" href="#"  data-open="education">
                <!-- <i class="dashboard-nav-card-icon fi-torso large" aria-hidden="true"></i> -->
                <img  class="dashboard-nav-card-icon" src="/img/education.svg" style="width:130px;height:60px" alt="sdfd">
                <h3 class="dashboard-nav-card-title">Education Infra</h3>
                <div class="dashboard-nav-card-content">
                    <h6 class="dashboard-nav-card-kpi" >Total School:<span id="school"><span></h6>
                    <h6 class="dashboard-nav-card-kpi" >Total Student: <span id="student"></span></h6>
                </div> 
                <img  class="dashboard-nav-card-more" src="/img/more.svg" style="width:80px;height:30px" alt="sdfd">
            </a>
            <div id="education" class="large reveal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog" >
                <h2 id="modalTitle">Education Infra</h2>
                <div class="row">
                <h6 style="color:#116d76">Village Name:<span class="village_name" style="color:#116d76"></span></h6>
                    <table class="responsive-card-table unstriped">
                        <thead>
                            <tr>
                            <th>Ref. Yr.:</th>
                            <th>Govt School(nos)</th>
                            <th>ADC School(nos)</th>
                            <th>Private School (nos)</th>
                            
                            <th>Student (Primary)</th>
                            <th>Teacher (Primary)</th>
                            
                            <th>Student (JHS)</th>
                            <th>Teacher (JHS)</th>
                            
                            <th>Student (Sec)</th>
                            <th>Teacher (Sec)</th>
                            

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td id="edn_refyr" data-label="Ref.Yr."></td>
                            <td id="govt"data-label="Govt School(nos)"></td>
                            <td id="adc"data-label="ADC School(nos)"></td>
                            <td id="private"data-label="Private School (nos)"></td>
                            <td id="prim_student"data-label="Student (Primary)"></td>
                            <td id="prim_teach"data-label="Teacher (Primary)"></td>
                            <td id="jhs_student"data-label="Student (JHS)"></td>
                            <td id="jhs_teach"data-label="Teacher (JHS)"></td>
                            <td id="sec_student"data-label="Student (Sec)"></td>
                            <td id="sec_teach"data-label="Teacher (Sec)"></td>
                            
                            
                            </tr>
                            
                        </tbody>
                    </table>

                </div>
                    <button class="close-button button tiny button alert" data-close aria-label="Close modal" type="button">
                         <span aria-hidden="true">&times;</span>
                    </button>
            </div>
        </div>         <!-- ********* END OF EDUCATION************* -->

<!-- ****************************ANGANWADIS DASH-BOARD CARD*************************************************** -->
        <div class="large-4 medium-6 small-12  columns">
            <a class="dashboard-nav-card" href="#"  style="background:purple !important;   background-clip:content-box!important;" data-open="anganwadi">
                <!-- <i class="dashboard-nav-card-icon fi-torso large" aria-hidden="true"></i> -->
                <img  class="dashboard-nav-card-icon" src="/img/baby-white.svg" style="width:130px;height:60px" alt="sdfd">
                <h3 class="dashboard-nav-card-title">Anganwadi</h3>
                <div class="dashboard-nav-card-content">
                    <h6 class="dashboard-nav-card-kpi">Total worker: <span id="ang_worker"></span></h6>
                    <h6 class="dashboard-nav-card-kpi">Total children: <span id ="ang_children"></span></h6>
                </div> 
                <img  class="dashboard-nav-card-more" src="/img/more.svg" style="width:80px;height:30px" alt="sdfd">
            </a>
            <div id="anganwadi" class="large reveal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog" >
                <h2 id="modalTitle">Anganwadis</h2>
                <div class="row">
                <h6 style="color:#116d76">Village Name:<span class="village_name" style="color:#116d76"></span></h6>
                    <table class="responsive-card-table unstriped">
                        <thead>
                            <tr>
                            <th>Ref. Yr.:</th>
                            <th>Anganwadi Centre(nos)</th>
                            <th>Enrolled Children(nos)</th>
                            <th>Anganwadi Worker Name</th>
                            <th>Contact(Worker)</th>
                            <th>Pregnant Woman(1st Qtr)</th>
                            <th>Pregnant Woman(2nd Qtr)</th>
                            <th>Pregnant Woman(3rd Qtr)</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td id="ang_refyr" data-label="Ref.Yr."></td>
                            <td  id="ang_centre"data-label="Anganwadi Centre(nos)"></td>
                            <td id="ang_childre" data-label="Children(nos)"></td>
                            <td id="ang_name" data-label="Worker Name"></td>
                            <td id="ang_contact" data-label="Contact"></td>
                            <td id="1st" data-label="1st Qtr (Preg Woman)"></td>
                            <td id="2nd" data-label="2nd Qtr (Preg Woman)"></td>
                            <td id="3rd" data-label="3rd Qtr (Preg Woman)"></td>
                            </tr>
                            
                        </tbody>
                    </table>

                </div>
                <button class="close-button button tiny button alert" data-close aria-label="Close modal" type="button">
                         <span aria-hidden="true">&times;</span>
                 </button>
            </div>
        </div><!--****** END OF ANGANWADIS **************  -->
         
      <!-- *****************************NSAP********************************* -->
        <div class="large-4 medium-6 small-12  columns">
            <a class="dashboard-nav-card" href="#" style="background:red !important;background-clip:content-box!important;" data-open="nsap">
                <!-- <i class="dashboard-nav-card-icon fi-torso large" aria-hidden="true"></i> -->
                <img  class="dashboard-nav-card-icon" src="/img/social-care.svg" style="width:130px;height:60px" alt="sdfd">
                <h3 class="dashboard-nav-card-title">NSAP</h3>
                <div class="dashboard-nav-card-content">
                    <h6 class="dashboard-nav-card-kpi">Total Beneficiaries: <span id="nsap_benef"></span></h6>
                   
                </div>  
                <img  class="dashboard-nav-card-more" src="/img/more.svg" style="width:80px;height:30px" alt="sdfd">
            </a>
            <div id="nsap" class="large reveal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog" >
                <h2 id="modalTitle">NSAP</h2>
                <div class="row">
                <h6 style="color:#116d76">Village Name:<span class="village_name" style="color:#116d76"></span></h6>
                    <table class="responsive-card-table unstriped">
                        <thead>
                            <tr>
                            <th>Ref. Yr.:</th>
                            <th>Widows Benef.(nos)</th>
                            <th>Differently Abled Benef.(nos)</th>
                            <th>IGNOAPS Benef.(nos)</th>
                            

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td id="nsap_refyr" data-label="Ref.Yr."></td>
                            <td id="nsap_widows" data-label="Widows Beneficiary(nos)"></td>
                            <td id="nsap_difabled" data-label="Differently Abled Benefeciary(nos)"></td>
                            <td id="nsap_ignoaps" data-label="IGNOAPS Beneficiary (nos)"></td>
                            
                            </tr>
                            
                        </tbody>
                    </table>

                </div><!--  ****END of NSAP table  div -->
                <button class="close-button button tiny button alert" data-close aria-label="Close modal" type="button">
                         <span aria-hidden="true">&times;</span>
                </button>
            </div><!--  ****END of NSAP modal  div -->
        </div><!--  **********END of NSAP DASH********** -->
<!-- ***************************************NREGA DASH BOARD ************************************************ -->
        <div class="large-4 medium-6 small-12  columns">
            <a class="dashboard-nav-card" href="#" style="background:green !important; background-clip:content-box!important;" data-open="nrega">
                <!-- <i class="dashboard-nav-card-icon fi-torso large" aria-hidden="true"></i> -->
                <img  class="dashboard-nav-card-icon" src="/img/nrega.svg" style="width:130px;height:60px" alt="sdfd">
                <h3 class="dashboard-nav-card-title">NREGA</h3>
                <div class="dashboard-nav-card-content">
                    <h6 class="dashboard-nav-card-kpi">Total JobCard: <span id="jobcard"></span></h6>
                    
                </div> 
                <img  class="dashboard-nav-card-more" src="/img/more.svg" style="width:80px;height:30px" alt="sdfd">
            </a>
            <div id="nrega" class="medium reveal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog" >
                <h2 id="modalTitle">NREGA</h2>
                <div class="row">
                <h6 style="color:#116d76">Village Name:<span class="village_name" style="color:#116d76"></span></h6>
                    <table class="responsive-card-table unstriped">
                        <thead>
                            <tr>
                                <th>Ref. Yr.:</th>
                                <th>Total Job Card</th> 
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td id="nrega_refyr"data-label="Ref.Yr."></td>
                                <td id="nrega_job"data-label="Total Job Card "></td>           
                            </tr>                        
                        </tbody>
                    </table>
                </div>
                <button class="close-button button tiny button alert" data-close aria-label="Close modal" type="button">
                         <span aria-hidden="true">&times;</span>
                </button>
            </div> <!-- ****** end of modal div********-->
        </div><!-- ************** end of NREGA DASH ***************************** -->
        <div class="large-4 medium-6 small-12  columns  ">
            <a class="dashboard-nav-card" href="#"style="background:darkcyan !important;   background-clip:content-box!important;">
                <!-- <i class="dashboard-nav-card-icon fi-torso large" aria-hidden="true"></i> -->
                <img  class="dashboard-nav-card-icon" src="/img/picture.svg" style="width:130px;height:60px" alt="sdfd">
                <h3 class="dashboard-nav-card-title">Photo</h3>
                <img  class="dashboard-nav-card-more" src="/img/more.svg" style="width:80px;height:30px" alt="sdfd"> 
            </a>
        </div> 

        <!-- ****************************CAFPD******************************* -->
        <div class="large-4 medium-6 small-12  columns end">
            <a class="dashboard-nav-card" href="#"  style="background:darkred !important; background-clip:content-box!important; " data-open="cafpd">
               
                <img  class="dashboard-nav-card-icon" src="/img/cafpd.svg" style="width:130px;height:60px" alt="sdfd">
                <h3 class="dashboard-nav-card-title">CAF&amp;PD</h3>
                <div class="dashboard-nav-card-content">
                    <h6 class="dashboard-nav-card-kpi">Total RationCard: <span id="rationcard"></span></h6>
                   
                </div> 
                <img  class="dashboard-nav-card-more" src="/img/more.svg" style="width:80px;height:30px" alt="sdfd">
            </a>
            <div id="cafpd" class="large reveal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog" >
                <h2 id="modalTitle">CAF&amp;PD</h2>
                <div class="row">
                <h6 style="color:#116d76">Village Name:<span class="village_name" style="color:#116d76"></span></h6>
                    <table class="responsive-card-table unstriped">
                        <thead>
                            <tr>
                                <th>Ref. Yr.:</th>
                                <th>AAY Card(nos)</th>
                                <th>AAY Members(nos)</th>
                                <th>PHH Card (nos)</th>
                                <th>PHH Members (nos)</th>
                                <th>Fair Price Shop name</th>
                            

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td id="cafd_refyr"data-label="Ref.Yr."><?= isset($vill_cafpd->reference_year) ? $vill_cafpd->reference_year:'-No Data-'?></td>
                                <td id="cafd_aay"data-label="AAY Card(nos)"><?= isset($vill_cafpd->total_aay_card) ? $vill_cafpd->total_aay_card:'0'?></td>
                                <td id="cafd_amember"data-label="AAY Members(nos)"><?= isset($vill_cafpd->total_aay_members) ? $vill_cafpd->total_aay_members:'0' ?></td>
                                <td id="cafd_phh"data-label="PHH Card (nos)"><?= isset($vill_cafpd->total_phh_card) ? $vill_cafpd->total_phh_card:'0' ?></td>
                                <td id="cafd_pmember"data-label="PHH Members (nos)"><?= isset($vill_cafpd->total_phh_members) ? $vill_cafpd->total_phh_members:'0' ?></td>
                                <td id="cafd_shop"data-label="Fair Price Shop Name"><?= isset($vill_cafpd->fair_price_shop_name) ? $vill_cafpd->fair_price_shop_name:'0' ?></td>
                            
                            </tr>
                            
                        </tbody>
                    </table>

                </div><!-- end of table -->
                <button class="close-button button tiny button alert" data-close aria-label="Close modal" type="button">
                         <span aria-hidden="true">&times;</span>
                </button>
            </div><!-- end of modal -->
        </div> 
        
        <div class="large-4 medium-6 small-12  columns">
            <a class="dashboard-nav-card" href="#" style="background:darkslategrey !important;   background-clip:content-box!important;" data-open="election">
            <!-- <i class="dashboard-nav-card-icon fi-torso large" aria-hidden="true"></i> -->
                <img  class="dashboard-nav-card-icon" src="/img/voting.svg" style="width:130px;height:60px" alt="sdfd">
                <h3 class="dashboard-nav-card-title">Election</h3>
                <div class="dashboard-nav-card-content">
                    <h6 class="dashboard-nav-card-kpi" >Total Voters: <span id ="voters"></span> </h6>
                     <h6 class="dashboard-nav-card-kpi" >Total Household:<span id ="election_household"></span> </h6>
                </div> 
                <img  class="dashboard-nav-card-more" src="/img/more.svg" style="width:80px;height:30px" alt="sdfd">
            </a>
            <div id="election" class="large reveal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog" >
                <h2 id="modalTitle">Election</h2>
                <div class="row">
                <h6 style="color:#116d76">Village Name:<span class="village_name" style="color:#116d76"></span></h6>
                    <table class="responsive-card-table unstriped">
                        <thead>
                            <tr>
                            
                            <th>Ref.Yr.</th>
                            <th>Total Voters</th>
                            <th>Total Household</th>
                            

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            
                            <td id="election_RefYr"data-label="Ref.Yr."></td>
                            <td id="election_voter"data-label="Voters"></td>
                            <td id="election_household"data-label="Household"></td>
                            
                            </tr>
                           
                            
                        </tbody>
                    </table>

                </div> <!-- end of row div -->
                <button class="close-button button tiny button alert" data-close aria-label="Close modal" type="button">
                         <span aria-hidden="true">&times;</span>
                </button>
            </div>          
        
    </div>     
    
</div>


