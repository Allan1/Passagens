<div>
<?php echo $this->Form->create('Manager'); ?>
	<fieldset>
		<legend><?php echo __('Editar modulo'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name',array('label'=>'nome'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('salvar')); ?>
</div>
