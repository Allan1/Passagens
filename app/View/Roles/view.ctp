<div>
<h2><?php  echo __('Papel'); ?></h2>
	<?php echo $this->Html->tag(__('p'),$this->Html->link(__('voltar'),array('action'=>'index')),array('class'=>'actions')); ?>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($role['Role']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($role['Role']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>