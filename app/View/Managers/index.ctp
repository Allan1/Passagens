<div>
	<h2><?php echo __('Gerenciadores'); ?></h2>
	<?php echo $this->Html->tag('p',$this->Html->link('adicionar',array('action'=>'add')),array('class'=>'actions')); ?>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('name','nome'); ?></th>
                        <th><?php echo $this->Paginator->sort('type','tipo'); ?></th>
                        <th><?php echo $this->Paginator->sort('link','link'); ?></th>
			<th class="actions"><?php echo __('ações'); ?></th>
	</tr>
	<?php
	foreach ($managers as $manager): ?>
	<tr>
		<td><?php echo h($manager['Manager']['name']); ?>&nbsp;</td>
                <td><?php echo h($manager['Manager']['type']); ?>&nbsp;</td>
                <td><?php echo h($manager['Manager']['link']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('editar'), array('action' => 'edit', $manager['Manager']['id'])); ?>
			<?php echo $this->Form->postLink(__('excluir'), array('action' => 'delete', $manager['Manager']['id']), null, __('Tem certeza que deseja deletar # %s?', $manager['Manager']['id'])); ?>
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
