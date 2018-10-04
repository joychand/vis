<?php
    $this->layout = 'villageProfile';
    $cakeDescription = 'VIS:Village Information System, Chandel';
?>


<div class="container" style="padding:10px; padding-bottom:80px; ">
    
    <div class="large-6 medium-8 small-9 small-centered medium-centered large-centered columns">
        <?= $this->Form->create() ?>
        <?php $targetUrl = $this->Url->build(['action' => 'getvillage']); ?>
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
                <!-- <input type="text" id="right-label" > -->
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
                <?= $this->Form->control('village_code',['type'=>'select','label'=>false,'empty'=>'Select Village','id'=>'village','required'=>true]) ?> 
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
     <div class="large-4 medium-6 small-12  columns">
            <a class="dashboard-nav-card" href="#" style="background:navy !important;  background-clip:content-box!important;">
                <!-- <i class="dashboard-nav-card-icon fi-torso large" aria-hidden="true"></i> -->
                <img  class="dashboard-nav-card-icon" src="img/pharmacy.svg" style="width:130px;height:60px" alt="sdfd">
                <h3 class="dashboard-nav-card-title">Health Infra</h3>
                <div class="dashboard-nav-card-content">
                    <!-- <h6 class="dashboard-nav-card-kpi">Total Doctors: 2</h6> -->
                    <p class="dashboard-nav-card-kpi">Total Doctors:  <span class="dashboard-nav-card-kpi" style="font-size:2rem !important">2<span></p>
                    <p class="dashboard-nav-card-kpi">Total ASHA:   <span class="dashboard-nav-card-kpi" style="font-size:2rem !important">4<span></p>
                </div> 
                
                <img  class="dashboard-nav-card-more" src="img/more.svg" style="width:80px;height:30px" alt="sdfd">
            </a>
        </div>
        <div class="large-4 medium-6 small-12  columns">
            <a class="dashboard-nav-card" href="#" >
                <!-- <i class="dashboard-nav-card-icon fi-torso large" aria-hidden="true"></i> -->
                <img  class="dashboard-nav-card-icon" src="img/education.svg" style="width:130px;height:60px" alt="sdfd">
                <h3 class="dashboard-nav-card-title">Education Infra</h3>
                <div class="dashboard-nav-card-content">
                    <h6 class="dashboard-nav-card-kpi">Total School: 2</h6>
                    <h6 class="dashboard-nav-card-kpi">Total Student: 64</h6>
                </div> 
                <img  class="dashboard-nav-card-more" src="img/more.svg" style="width:80px;height:30px" alt="sdfd">
            </a>
        </div>
        <div class="large-4 medium-6 small-12  columns">
            <a class="dashboard-nav-card" href="#"  style="background:purple !important;   background-clip:content-box!important;">
                <!-- <i class="dashboard-nav-card-icon fi-torso large" aria-hidden="true"></i> -->
                <img  class="dashboard-nav-card-icon" src="img/baby-white.svg" style="width:130px;height:60px" alt="sdfd">
                <h3 class="dashboard-nav-card-title">Anganwadi</h3>
                <div class="dashboard-nav-card-content">
                    <h6 class="dashboard-nav-card-kpi">Total worker: 4</h6>
                    <h6 class="dashboard-nav-card-kpi">Total children: 12</h6>
                </div> 
                <img  class="dashboard-nav-card-more" src="img/more.svg" style="width:80px;height:30px" alt="sdfd">
            </a>
        </div> 
        <div class="large-4 medium-6 small-12  columns">
            <a class="dashboard-nav-card" href="#" style="background:chocolate !important;   background-clip:content-box!important;">
                <!-- <i class="dashboard-nav-card-icon fi-torso large" aria-hidden="true"></i> -->
                <img  class="dashboard-nav-card-icon" src="img/population.svg" style="width:130px;height:60px" alt="sdfd">
                <h3 class="dashboard-nav-card-title">Demography</h3>
                <div class="dashboard-nav-card-content">
                    <h6 class="dashboard-nav-card-kpi">Total Population: 664</h6>
                    <h6 class="dashboard-nav-card-kpi">Total Household: 64</h6>
                </div> 
                <img  class="dashboard-nav-card-more" src="img/more.svg" style="width:80px;height:30px" alt="sdfd">
            </a>
        </div>         
    <!-- </div> -->
    
         
        <!-- <div class="row"> -->
        <div class="large-4 medium-6 small-12  columns">
            <a class="dashboard-nav-card" href="#" style="background:red !important;background-clip:content-box!important;">
                <!-- <i class="dashboard-nav-card-icon fi-torso large" aria-hidden="true"></i> -->
                <img  class="dashboard-nav-card-icon" src="img/social-care.svg" style="width:130px;height:60px" alt="sdfd">
                <h3 class="dashboard-nav-card-title">NSAP</h3>
                <div class="dashboard-nav-card-content">
                    <h6 class="dashboard-nav-card-kpi">Total Beneficiary: 64</h6>
                   
                </div>  
                <img  class="dashboard-nav-card-more" src="img/more.svg" style="width:80px;height:30px" alt="sdfd">
            </a>
        </div>
        <div class="large-4 medium-6 small-12  columns">
            <a class="dashboard-nav-card" href="#" style="background:green !important; background-clip:content-box!important;">
                <!-- <i class="dashboard-nav-card-icon fi-torso large" aria-hidden="true"></i> -->
                <img  class="dashboard-nav-card-icon" src="img/nrega.svg" style="width:130px;height:60px" alt="sdfd">
                <h3 class="dashboard-nav-card-title">NREGA</h3>
                <div class="dashboard-nav-card-content">
                    <h6 class="dashboard-nav-card-kpi">Total JobCard: 45</h6>
                    
                </div> 
                <img  class="dashboard-nav-card-more" src="img/more.svg" style="width:80px;height:30px" alt="sdfd">
            </a>
        </div>
        <div class="large-4 medium-6 small-12  columns  ">
            <a class="dashboard-nav-card" href="#"style="background:darkcyan !important;   background-clip:content-box!important;">
                <!-- <i class="dashboard-nav-card-icon fi-torso large" aria-hidden="true"></i> -->
                <img  class="dashboard-nav-card-icon" src="img/picture.svg" style="width:130px;height:60px" alt="sdfd">
                <h3 class="dashboard-nav-card-title">Photo</h3>
                <img  class="dashboard-nav-card-more" src="img/more.svg" style="width:80px;height:30px" alt="sdfd"> 
            </a>
        </div> 
        <div class="large-4 medium-6 small-12  columns end">
            <a class="dashboard-nav-card" href="#"  style="background:darkred !important; background-clip:content-box!important; ">
                <!-- <i class="dashboard-nav-card-icon fi-torso large" aria-hidden="true"></i> -->
                <img  class="dashboard-nav-card-icon" src="img/cafpd.svg" style="width:130px;height:60px" alt="sdfd">
                <h3 class="dashboard-nav-card-title">CAF&PD</h3>
                <div class="dashboard-nav-card-content">
                    <h6 class="dashboard-nav-card-kpi">Total RationCard: 40</h6>
                   
                </div> 
                <img  class="dashboard-nav-card-more" src="img/more.svg" style="width:80px;height:30px" alt="sdfd">
            </a>
        </div>         
        <!-- </div> -->
        </div>     
    
</div>


