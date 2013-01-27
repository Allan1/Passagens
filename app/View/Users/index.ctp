<div>
	<h2><?php echo __('Usuários'); ?></h2>
	<?php echo $this->Html->tag('p',$this->Html->link('adicionar',array('action'=>'add')),array('class'=>'actions')); ?>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('fullName','Nome Completo'); ?></th>
                        <th><?php echo $this->Paginator->sort('role','Função'); ?></th>
                        <th><?php echo $this->Paginator->sort('username','Login'); ?></th>
                        <th><?php echo $this->Paginator->sort('password','Senha'); ?></th>
                        <th class="actions"><?php echo __('ações'); ?></th>
	</tr>
	<?php
	foreach ($users as $user): ?>
	<tr>
		<td><?php echo h($user['User']['fullName']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['role']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['username']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['password']); ?>&nbsp;</td>
                <td class="actions">
			<?php echo $this->Html->link(__('editar'), array('action' => 'edit', $user['User']['id'])); ?>
			<?php echo $this->Form->postLink(__('excluir'), array('action' => 'delete', $user['User']['id']), null, __('Tem certeza que deseja deletar %s?', $user['User']['fullName'] )); ?>
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
