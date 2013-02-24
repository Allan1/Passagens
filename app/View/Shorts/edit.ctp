<div>
<?php echo $this->Form->create('Short'); ?>
	<fieldset>
		<legend><?php echo __('Editar modulo'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name',array('label'=>'nome'));
                echo $this->Form->input('city_id',array('type'=>'hidden'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('salvar')); ?>
</div>
