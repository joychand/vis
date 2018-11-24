<?php  $this->layout='index_layout';
$this->Html->script('DataTables/empty-village.js',['block'=>'scriptBottom']); 


?>

<div class="empyvillage index large-9 medium-8 columns content large-centered medium-centered small-centered">
<?= $this->Form->create()?>

    <h3 style="text-align:center"><?= __('DataEntry Remaining Village List for '.$sectorName) ?></h3>
    <!-- <div class = "large-4 medium-3 columns large-centered medium-centered">
    <?= $this->Form->control('subdivision',['label'=>'Filter by Subdivision:','type'=>'select','options'=>$subDivs,'empty'=>'All Villages','id'=>'subdivision'])?>
    </div> -->
    
   <!-- <div class="row"><h6>NO. of Villges: <label id="villageno" style="color:red"></label></h6>  </div>   -->
  
    <table id="emptyVillage" class="display compact" style="width:100%">
        <thead>
           
             <tr>
              <th></th>
              <th >Village name:</th>
             
              <th>Subdivision</th>
                       
                
               
            </tr>
        </thead>
        <tbody>
            <?php foreach ($query as $village): ?>
            <tr>
                <td></td>
                 <td><?= h($village->village_name) ?></td>
                 <td><?= h($village->subdistrict->subdistrict_name) ?></td>
                             
                
            </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
         <td></td>
         <td>Village_name</td>
         <td>Subdivision</td>
        </tfoot>
       
    </table>
   
   
</body>
</html>