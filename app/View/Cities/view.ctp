<div>
<h2><?php  echo __('City'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($city['City']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($city['City']['name']); ?>
			&nbsp;
		</dd>
                <dt><?php echo __('Estado'); ?></dt>
		<dd>
			<?php echo h($city['City']['type']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
