<div  style="margin: auto;
    width: 50%;
    border: 3px;
    padding: 10px;">
    <h1> Social Welfare Data Entry </h1>
<!-- <?php echo htmlentities(print_r($session_variable,true));?> -->
<ul>
    <li><?= $this->HTML->link('Anganwadi',['controller'=>'Anganwadis','action'=>'add'])?></li>
    <li><?= $this->HTML->link('NSAPS',['controller'=>'VillageNsaps','action'=>'add'])?></li>
    
</ul>
</div>
