<div>
<?php echo $this->Form->create('Manager'); ?>
	<fieldset>
		<legend><?php echo __('Adicionar gerenciador'); ?></legend>
	<?php
		echo $this->Form->input('name',array('label'=>'nome'));
                echo $this->Form->input('type',array('label'=>'tipo'));
                echo $this->Form->input('link',array('label'=>'link'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('salvar')); ?>
</div>
