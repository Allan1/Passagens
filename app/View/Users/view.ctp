<div>
<h2><?php  echo __('Usuário'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($user['User']['name']); ?>
			&nbsp;
		</dd>
                <dt><?php echo __('Papel'); ?></dt>
		<dd>
			<?php echo h($user['Role']['name']); ?>
			&nbsp;
		</dd>
                <dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
