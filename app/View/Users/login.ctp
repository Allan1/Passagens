<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Digite seu nome de usuário e senha'); ?></legend>
        <?php echo $this->Form->input('username',array('label'=>'Nome de usuário'));
        echo $this->Form->input('password',array('label'=>'Senha'));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Login')); ?>
</div>