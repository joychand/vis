<div  style="position:absolute;right:0;background-color:yellow;color:black; border:5px; border-style:solid;border-color:green"><p style="margin:0 !important;">Last login: <small><?php 
  if(isset($last_login->last_login))
     { 
         echo $last_login->last_login->i18nFormat('dd-MM-yyyy h:mm:ss a z','Asia/Kolkata');
        // $user->created->i18nFormat('MMM dd, yyyy h:mm:ss a z');
     } 
   else 
     {
         echo 'Login 1st Time';} ?></small></p><p style="text-align:right; margin:0 !important"><?= $this->Html->link(__('view>>'), [ 'controller'=>'UserAudits','action' => 'index']) ?></p></div>