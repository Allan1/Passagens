<div>
    <?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Adicionar usuário'); ?></legend>
        <?php
        echo $this->Form->input('name', array('label' => 'Nome'));
        echo $this->Form->input('username', array('label' => 'Login'));
        echo $this->Form->input('password', array('label' => 'Password'));
        echo $this->Form->input('role_id', array('label'=>'Papel'));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('salvar')); ?>
</div>
