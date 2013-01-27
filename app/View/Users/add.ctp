<div>
    <?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Adicionar usuário'); ?></legend>
        <?php
        echo $this->Form->input('fullName', array('label' => 'Nome Completo'));
        echo $this->Form->input('role', array('options' => array('admin' => 'Administrador')));
        echo $this->Form->input('username', array('label' => 'Login'));
        echo $this->Form->input('password', array('label' => 'Password'));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('salvar')); ?>
</div>
