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
    <?= $this->Html->css('DataTables/jquery.dataTables.min.css') ?> 
    <?= $this->Html->css('DataTables/dataTables.jqueryui.min.css') ?> 
    <?= $this->Html->css('DataTables/dataTables.semanticui.min.css') ?> 
     
    <?= $this->Html->css('foundation-icons/foundation-icons.css')?>
    <?= $this->Html->script('jquery-3.3.1.min.js')?>
   
   
    <?= $this->Html->script('DataTables/DataTables.min.js')?>
    <?= $this->Html->script('DataTables/jquery.dataTables.min.js')?>
    <?= $this->Html->script('DataTables/visdatatable.js')?>

     <link href="https://fonts.googleapis.com/css?family=Raleway:500i|Roboto:300,400,700|Roboto+Mono" rel="stylesheet"> 
    
                        
</head>
<body >
<div class="empyvillage index large-9 medium-8 columns content large-centered medium-centered small-centered">
<?= $this->Form->create()?>
<?= $this->Form->control('subdivision',['label'=>'Filter by Subdivision:','type'=>'select','options'=>$subDivs,'empty'=>'All Villages','id'=>'subdivision'])?>
    <h3><?= __('Village data not Entered:') ?></h3>
    <h4>Chakpikarong Subdivision</h4>
  
    <table id="village" class="display">
        <thead>
            <tr>
            <th></th>
              <th >Village name:</th>
              <th >SubDivision:</th>
                       
                
               
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
    </table>
    <!-- <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div> -->
   
</body>
</html>