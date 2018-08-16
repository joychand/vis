<?= $this->Html->css('bootstrap.min.css', ['block'=>true]) ?>
<?= $this->Html->script('bootstrap.min.js', ['block'=>true]) ?>



<div  class=" columns content " style="margin: auto !important ;border: 3px !important; padding: 10px!important;">
    <h3 style="text-align: center; color:green">Welcome to  Village Infromation System of Chandel Distict, Manipur</h3> 
 <h4 align="center">Department/Schemes:Security Report (Demography)</h4>
 <div class="text-center">
 <?php echo $this->Html->link(
    $this->Html->tag('i', '', array('class' => 'icon-star')) . " Click to Start>>",
    array('action' => 'add'),
    array('class' => 'btn btn-success', 'escape' => false)
);?>
 </div>
 
</div>