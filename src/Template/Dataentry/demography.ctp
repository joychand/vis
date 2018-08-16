<div  style="margin: auto;
    width: 50%;
    border: 3px;
    padding: 10px;">
    <h1> Demography Data Entry </h1>
<!-- <?php echo htmlentities(print_r($session_variable,true));?> -->
<ul>
    <li><?= $this->HTML->link('Election',['controller'=>'VillageElectorals','action'=>'home'])?></li>
    <li><?= $this->HTML->link('SDOReport',['controller'=>'Sdoreport','action'=>'add'])?></li>
    <li><?= $this->HTML->link('NERCORMP',['controller'=>'Nercormp','action'=>'add'])?></li>
    <li><?= $this->HTML->link('NAREGA')?></li>
    <li><?= $this->HTML->link('Security Report')?></li>
</ul>
</div>


