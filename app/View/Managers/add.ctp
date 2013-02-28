<div>
<?php echo $this->Form->create('Manager'); ?>
	<fieldset>
		<legend><?php echo __('Adicionar gerenciador'); ?></legend>
	<?php
		echo $this->Form->input('name',array('label'=>'nome'));
                echo $this->Form->input('managers_type_id',array('label'=>'tipo','options'=>$managers_types));
                echo $this->Form->input('link',array('label'=>'link'));
                echo 'Obs.: Coloque "***" onde fica o código ou a abreviação da cidade e para passagens coloque também "*dia*" para o dia, "*mes*" para o mês, "*ano*" para o ano onde ficam as datas de ida e volta.'
	?>
	</fieldset>
<?php echo $this->Form->end(__('salvar')); ?>
</div>
