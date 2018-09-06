<?php
    $this->layout = false;
    $cakeDescription = 'CVIS: Chandel Village Information System';
?>

<!DOCTYPE html>
<html >
<head>
    <?= $this->Html->charset() ?>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
    </title>

    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('base.css') ?>
   
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('home.css') ?> 
    
    <?= $this->Html->css('foundation-icons/foundation-icons.css')?>
    <?= $this->Html->script('jquery-3.3.1.min.js')?>
    <?= $this->Html->script('dropdown.js');?>
   
   

     <link href="https://fonts.googleapis.com/css?family=Raleway:500i|Roboto:300,400,700|Roboto+Mono" rel="stylesheet"> 
    
                        
</head>
<body >
<div class="container" style="padding:10px; padding-bottom:80px; ">
    <header class="row " style:"width:100% !important">
        <div class="small-2 medium-2 columns" style="padding:10px !important;"><?= $this->Html->image('Logo_kanglasha.png') ?></div>
        <div class="small-10 medium-10 columns" style="text-align:right">
            <h1 style=" font-weight:300;font-size:1.1em;padding-bottom:0;">Village Information System (VIS)  </h1>
            <h1 style="font-size:.9em;padding-top:0;">Chandel District, Manipur  </h1>
        </div>  

    </header>
    <div class="row">
       
            <fieldset class="fieldset">    
                <legend><?= __('Village Profile') ?></legend>        
</fieldset>
        </div>
    <div class="row columns small-centered">
         <h3> <small>Sudbdivision:</small> <strong><?= $subdivision->subdistrict_name?></strong></h3> 
    </div>
    <div class="row columns small-centered">
         <h3><small>Village:</small><strong><?= $village->village_name ?></strong></h3>
    </div>
    <!-- <div class="row">
    <div class="large-5 medium-6 columns">
        <div class="card-info success">
          <div class="card-info-label">
            <div class="card-info-label-text">
            
            </div>
          </div>
        
            <div class="card-info-content">
              <h3 class="lead dash-title" style=" color:#ffae00"> HealthInfras</h3>
              <hr class="dash-hr"> 
              <p >Name of CHC: <?= $vill_health->name_of_health_centre?></p>
              <p >No. of Doctors: <?= $vill_health->name_of_health_centre ?></p>
              <p >No. of ANM:<?= $vill_health->name_of_health_centre?></p>
            </div>
        </div>    
    </div>
    <div class="large-5 medium-6 columns">
        <div class="card-info alert">
          <div class="card-info-label">
            <div class="card-info-label-text">
            
            </div>
          </div>
        
            <div class="card-info-content">
              <h3 class="lead dash-title" style=" color:#ffae00"> Demography</h3>
              <hr class="dash-hr"> 

              <p >GTV:Household <?= $village_gtv->total_household?></p>
              <p >Populations: <?= $village_gtv->total_population ?></p>
             
            </div>
        </div>    
    </div>
    
    </div> -->
    <div class="row">
    <span style="color:red">Demography:</span>
    <table class="responsive-card-table unstriped">
  <thead>
    <tr>
    
      <th>Agency</th>
      <th>Ref. Yr.</th>
      <th>Total Household</th>
      <th>Total Populations</th>
      

    </tr>
  </thead>
  <tbody>
    <tr>
      <td data-label="Agency">GTV</td>
      <td data-label="Ref.Yr."><?= $village_gtv->reference_year?></td>
      <td data-label="Household"><?= $village_gtv->total_household ?></td>
      <td data-label="Population"><?= $village_gtv->total_population ?></td>
     
    </tr>
    <tr>
      <td data-label="Agency">Security Report</td>
      <td data-label="Ref.Yr."><?= $village_sec->reference_year?></td>
      <td data-label="Household"><?= $village_sec->total_household ?></td>
      <td data-label="Population"><?= $village_sec->total_population ?></td>
     
    </tr>
    <tr>
      <td data-label="Agency">NERCORMP</td>
      <td data-label="Ref.Yr."><?= $village_nercormp->reference_year?></td>
      <td data-label="Household"><?= $village_nercormp->total_household ?></td>
      <td data-label="Population"><?= $village_nercormp->total_population ?></td>
     
    </tr>
    
  </tbody>
</table>

    </div>

    <div class="row">
    <span style="color:blue">Health Infras:</span>
    <table class="responsive-card-table unstriped">
  <thead>
    <tr>
     <th>Ref. Yr.:</th>
      <th>CHC/PHC/PHSC Name:</th>
      <th>No. of Doctors:</th>
      <th>No. of ANM:</th>
      <th>No. of Staff Nurse:</th>
      <th>No. of ASHA Worker:</th>
      <th>No. of ASHA Contact:</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <td data-label="Ref.Yr."><?= $vill_health->health_reference_year?></td>
      <td data-label="CHC/PHC/PHSC"><?= $vill_health->name_of_health_centre?></td>
      <td data-label="Doctors"><?= $vill_health->no_of_doctors ?></td>
      <td data-label="ANM"><?= $vill_health->no_of_anm ?></td>
      <td data-label="Staff Nurse"><?= $vill_health->no_of_staff_nurse?></td>
      <td data-label="ASHA"><?= $vill_health->no_of_asha ?></td>
      <td data-label="Contact(ASHA)"><?= $vill_health->asha_mobile ?></td>
    </tr>
    
  </tbody>
</table>

    </div>
    
    <div class="row">
    <span style="color:green">Anganwadis:</span>
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
      <td data-label="Ref.Yr."><?= $vill_anganwadi->anganwadi_reference_year?></td>
      <td data-label="Anganwadi Centre(nos)"><?= $vill_anganwadi->total_anganwadi_centre?></td>
      <td data-label="Children(nos)"><?= $vill_anganwadi->total_enrolled_children ?></td>
      <td data-label="Worker Name"><?= $vill_anganwadi->anganwadi_worker_name ?></td>
      <td data-label="Contact"><?= $vill_anganwadi->worker_mobile?></td>
      <td data-label="1st Qtr (Preg Woman)"><?= $vill_anganwadi->first_qtr_pregnant ?></td>
      <td data-label="2nd Qtr (Preg Woman)"><?= $vill_anganwadi->second_qtr_pregnant ?></td>
      <td data-label="3rd Qtr (Preg Woman)"><?= $vill_anganwadi->third_qtr_pregnant ?></td>
    </tr>
    
  </tbody>
</table>

    </div>

<div class="row">
    <span style="color:purple">NSAP:</span>
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
      <td data-label="Ref.Yr."><?= $vill_nsap->reference_year?></td>
      <td data-label="Widows Beneficiary(nos)"><?= $vill_nsap->total_widows_beneficiary?></td>
      <td data-label="Differently Abled Benefeciary(nos)"><?= $vill_nsap->total_handicap_beneficiary ?></td>
      <td data-label="IGNOAPS Beneficiary (nos)"><?= $vill_nsap->total_ignoaps_beneficiary ?></td>
      
    </tr>
    
  </tbody>
</table>

    </div>
    <div class="row">
    <span style="color:purple">CAF&PD:</span>
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
      <td data-label="Ref.Yr."><?= $vill_cafpd->reference_year?></td>
      <td data-label="AAY Card(nos)"><?= $vill_cafpd->total_aay_card?></td>
      <td data-label="AAY Members(nos)"><?= $vill_cafpd->total_aay_members ?></td>
      <td data-label="PHH Card (nos)"><?= $vill_cafpd->total_phh_card ?></td>
      <td data-label="PHH Members (nos)"><?= $vill_cafpd->total_phh_members ?></td>
      <td data-label="Fair Price Shop Name"><?= $vill_cafpd->fair_price_shop_name ?></td>
      
    </tr>
    
  </tbody>
</table>

    </div>
    <div class="row">
    <span style="color:green">Education:</span>
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
      <td data-label="Ref.Yr."><?= $vill_edn->education_reference_year?></td>
      <td data-label="AAY Card(nos)"><?= $vill_edn->total_govt_school?></td>
      <td data-label="AAY Members(nos)"><?= $vill_edn->total_adc_school ?></td>
      <td data-label="PHH Card (nos)"><?= $vill_edn->total_private_school ?></td>
      <td data-label="Student (Primary)"><?= $vill_edn->total_primary_student ?></td>
      <td data-label="Teacher (Primary)"><?= $vill_edn->total_primary_teacher ?></td>
      <td data-label="Student (JHS)"><?= $vill_edn->total_jhs_student?></td>
      <td data-label="Teacher (JHS)"><?= $vill_edn->total_jhs_teacher?></td>
      <td data-label="Student (Sec)"><?= $vill_edn->total_secondary_student ?></td>
      <td data-label="Teacher (Sec)"><?= $vill_edn->total_secondary_teacher ?></td>
      
      
    </tr>
    
  </tbody>
</table>

    </div>

<div class="row">
    <span style="color:red">NREGA:</span>
    <table class="responsive-card-table unstriped">
  <thead>
    <tr>
     <th>Ref. Yr.:</th>
      <th>Total Job Card</th>
     
      

    </tr>
  </thead>
  <tbody>
    <tr>
      <td data-label="Ref.Yr."><?= $vill_edn->education_reference_year?></td>
      <td data-label="Total Job Card "><?= $vill_edn->total_govt_school?></td>
     
      
    </tr>
    
  </tbody>
</table>

    </div>


 </div>   

</body>
</html>

