<div>
	<h2><?php echo __('Cidades'); ?></h2>
	<?php echo $this->Html->tag('p',$this->Html->link('adicionar',array('action'=>'add')),array('class'=>'actions')); ?>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('name','nome'); ?></th>
                        <th><?php echo $this->Paginator->sort('state','estado'); ?></th>
			<th class="actions"><?php echo __('ações'); ?></th>
	</tr>
	<?php
	foreach ($cities as $city): ?>
	<tr>
		<td><?php echo h($city['City']['name']); ?>&nbsp;</td>
                <td><?php echo h($city['City']['state']); ?>&nbsp;</td>
                <td class="actions">
			<?php echo $this->Html->link(__('editar'), array('action' => 'edit', $city['City']['id'])); ?>
			<?php echo $this->Form->postLink(__('excluir'), array('action' => 'delete', $city['City']['id']), null, __('Tem certeza que deseja deletar # %s?', $city['City']['id'])); ?>
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
