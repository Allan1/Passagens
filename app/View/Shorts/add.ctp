<div>
<?php echo $this->Form->create('Short'); ?>
	<fieldset>
		<legend><?php echo __('Adicionar abreviação'); ?></legend>
	<?php
		echo $this->Form->input('name',array('label'=>'nome'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('salvar')); ?>
</div>
