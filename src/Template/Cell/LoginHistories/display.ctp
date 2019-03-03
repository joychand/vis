<div  style="position:absolute;right:0;background-color:yellow;color:black; border:5px; border-style:solid;border-color:green"><p style="margin:0 !important;">Last login: <?php 
  if(isset($last_login->last_login))
     { 
         echo $last_login->last_login;
     } 
   else 
     {
         echo 'Login 1st Time';} ?></p><p style="text-align:right; margin:0 !important"><?= $this->Html->link(__('view>>'), [ 'controller'=>'UserAudits','action' => 'index']) ?></p></div>