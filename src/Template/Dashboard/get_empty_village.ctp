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
    
    <?= $this->Html->css('foundation-icons/foundation-icons.css')?>
    <?= $this->Html->script('jquery-3.3.1.min.js')?>
   
    <?= $this->Html->script('count.js')?>

     <link href="https://fonts.googleapis.com/css?family=Raleway:500i|Roboto:300,400,700|Roboto+Mono" rel="stylesheet"> 
    
                        
</head>
<body >
<div class="empyvillage index large-9 medium-8 columns content large-centered medium-centered small-centered">
    <h3><?= __('Village data not Entered:') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
              <th scope="col"><?= $this->Paginator->sort('Village:') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Subdivision:') ?></th>
               
                
               
            </tr>
        </thead>
        <tbody>
            <?php foreach ($remaining_village as $village): ?>
            <tr>
                 <td><?= h($village->village_name) ?></td>
                 <td><?= h($village->subdistrict->subdistrict_name) ?></td>
                              
                
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</body>
</html>