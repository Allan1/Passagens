<?php

?>
<table>
    <tr>
        <th><?php echo $this->Paginator->sort('ID', 'id'); ?></th>
        <th><?php echo $this->Paginator->sort('Nome', 'name'); ?></th>
    </tr>
       <?php foreach($cities as $city): ?>
    <tr>
        <td><?php echo $city['City']['id']; ?> </td>
        <td><?php echo $this->Html->link($city['City']['name'],array('action'=>'view',$city['City']['id'])); ?> </td>
    </tr>
    <?php endforeach; ?>
</table>
<!-- Shows the page numbers -->
<?php echo $this->Paginator->numbers(); ?>
<!-- Shows the next and previous links -->
<?php echo $this->Paginator->prev('« Previous', null, null, array('class' => 'disabled')); ?>
<?php echo $this->Paginator->next('Next »', null, null, array('class' => 'disabled')); ?>
<!-- prints X of Y, where X is current page and Y is number of pages -->
<?php echo $this->Paginator->counter(); ?>
<?php
echo $this->Paginator->counter(array(
    'format' => 'Page %page% of %pages%, showing %current% records out of
             %count% total, starting on record %start%, ending on %end%'
));
?>
