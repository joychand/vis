
<div  class ="large-6 medium-5" style="margin: auto !important ;border: 3px !important; padding: 10px!important;">
<h1>CAF&PD Data entry</h1>
<?= $this->Form->create() ?>
<?= $this->Form->control('subdistrict',['type'=>'select','label'=>'Sub-Division','options'=>$subdistricts,'empty'=>'Select Sub-Division']) ?>
<?= $this->Form->button('Start');?>
</div>
