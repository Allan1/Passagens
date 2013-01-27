<div>
<h2><?php  echo __('Cidade'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($city['City']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($city['City']['name']); ?>
			&nbsp;
		</dd>
                <dt><?php echo __('Estado'); ?></dt>
		<dd>
			<?php echo h($city['City']['state']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
