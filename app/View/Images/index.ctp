<?php echo $this->Form->create('Image'); ?>
    <fieldset>
        <legend><?php echo __('Trocar Background'); ?></legend>
        
        
        <?php
           echo $this->Form->input('Imagem: ', array('type' => 'file'));
           echo $this->Form->input('bBackground',array('label'=>'Retirar background? ','type'=>'checkbox'));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Confirmar')); ?>
