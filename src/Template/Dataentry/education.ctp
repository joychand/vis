<div class ="large-6 medium-5" style="margin: auto !important ;border: 3px !important; padding: 10px!important;">
<h1>Education Data Entry</h1>
<?= $this->Form->create() ?>
<?= $this->Form->control('subdistrict',['type'=>'select','label'=>'Sub-Division','options'=>$subdistricts,'emplty'=>'Select SubDivision','empty'=>'Select Sub-Division']) ?>
<?= $this->Form->button('Start');?>

</div>
