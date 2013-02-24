<div>
	<h2><?php echo __('Gerenciadores da abreviação "'.$managers['Short']['name'].'"'); ?></h2>
        <?php if($managers_unrelated): ?>
            <?php echo $this->Form->create('ManagersShort');?>
            <?php echo $this->Form->select('manager_id',$managers_unrelated);?>
            <?php echo $this->Form->end('Associar');?>
        <?php endif;?>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('name','nome'); ?></th>
                        <th><?php echo $this->Paginator->sort('name','tipo'); ?></th>
                        <th><?php echo $this->Paginator->sort('link','link'); ?></th>
			<th class="actions"><?php echo __('ações'); ?></th>
	</tr>
	<?php
	foreach ($managers['Manager'] as $manager): ?>
	<tr>
		<td><?php echo h($manager['name']); ?>&nbsp;</td>
                <td><?php echo h($manager['ManagersType']['name']); ?>&nbsp;</td>
                <td><?php echo h($manager['link']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Form->postLink(__('desassociar'), array('controller'=>'managers_shorts','action' => 'delete', $manager['id'], $managers['Short']['id']), null, __('Tem certeza que deseja desassociar "%s"?', $manager['name'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
