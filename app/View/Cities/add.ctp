<div>
<?php echo $this->Form->create('City'); ?>
	<fieldset>
		<legend><?php echo __('Adicionar cidade'); ?></legend>
	<?php
		echo $this->Form->input('name',array('label'=>'nome'));
                echo $this->Form->input('state',array('label'=>'estado'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('salvar')); ?>
</div>
