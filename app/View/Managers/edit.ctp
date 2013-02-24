<div>
<?php echo $this->Form->create('Manager'); ?>
	<fieldset>
		<legend><?php echo __('Editar modulo'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name',array('label'=>'nome'));
                echo $this->Form->input('managers_type_id',array('label'=>'tipo','options'=>$managers_types));
                echo $this->Form->input('link',array('label'=>'link (coloque "***" onde fica o código ou a abreviação da cidade)'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('salvar')); ?>
</div>
