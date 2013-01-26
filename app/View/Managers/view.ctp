<div>
<h2><?php  echo __('Manager'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($manager['Manager']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($manager['Manager']['name']); ?>
			&nbsp;
		</dd>
                <dt><?php echo __('Tipo'); ?></dt>
		<dd>
			<?php echo h($manager['Manager']['type']); ?>
			&nbsp;
		</dd>
                <dt><?php echo __('Link'); ?></dt>
		<dd>
			<?php echo h($manager['Manager']['link']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
