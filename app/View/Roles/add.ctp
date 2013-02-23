<div>
<?php echo $this->Form->create('Role'); ?>
	<fieldset>
		<legend><?php echo __('Adicionar Papel'); ?></legend>
	<?php echo $this->Form->input('name',array('label'=>'Nome'));?>
	</fieldset>
<?php echo $this->Form->end(__('salvar')); ?>
</div>