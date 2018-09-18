<?php $this->layout=false;
$cakeDescription = 'VIS: Chandel Village Information System';
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
    <?= $this->Html->css('DataTables/datatables.min.css') ?> 
    <!-- <?= $this->Html->css('DataTables/jquery.dataTables.min.css') ?> 
    <?= $this->Html->css('DataTables/dataTables.jqueryui.min.css') ?> 
    <?= $this->Html->css('DataTables/dataTables.semanticui.min.css') ?>  -->
    <?= $this->Html->css('https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css') ?>  
    <?= $this->Html->css('foundation-icons/foundation-icons.css')?>
    <?= $this->Html->script('jquery-3.3.1.min.js')?>
   
   
    <?= $this->Html->script('DataTables/DataTables.min.js')?>
    <!-- <?= $this->Html->script('DataTables/jquery.dataTables.min.js')?> -->
    <?= $this->Html->script('https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js')?>
    <?= $this->Html->script('https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js')?>
    <?= $this->Html->script('https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js')?> 
    <?= $this->Html->script('DataTables/visdatatable.js')?>

     <link href="https://fonts.googleapis.com/css?family=Raleway:500i|Roboto:300,400,700|Roboto+Mono" rel="stylesheet"> 
    
                        
</head>
<body >
<div class="empyvillage index large-9 medium-8 columns content large-centered medium-centered small-centered">
<?= $this->Form->create()?>

    <h3><?= __('Village data not Entered:') ?></h3>
    <div class = "large-4 medium-3 columns large-centered medium-centered">
    <?= $this->Form->control('subdivision',['label'=>'Filter by Subdivision:','type'=>'select','options'=>$subDivs,'empty'=>'All Villages','id'=>'subdivision'])?>
    </div>
    
   <div class="row"><h6>NO. of Villges: <label id="villageno" style="color:red"></label></h6>  </div>  
  
    <table id="village" class="display nowrap">
        <thead>
           
             <tr>
              <th></th>
              <th >Village name:</th>
             
              <th>Subdivision</th>
                       
                
               
            </tr>
        </thead>
        <tbody>
            <?php foreach ($chakpikarong_village as $village): ?>
            <tr>
                <td></td>
                 <td><?= h($village->village_name) ?></td>
                 <td><?= h($village->subdistrict->subdistrict_name) ?></td>
                             
                
            </tr>
            <?php endforeach; ?>
        </tbody>
        <!-- <tfoot>
        <td></td>
        <td></td>
        <td></td>
        </tfoot> -->
    </table>
   
   
</body>
</html>