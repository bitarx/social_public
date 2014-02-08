<div class="errors view">
<h2><?php echo __('Error'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($error['Error']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Message'); ?></dt>
		<dd>
			<?php echo h($error['Error']['message']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Delete Flg'); ?></dt>
		<dd>
			<?php echo h($error['Error']['delete_flg']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Error'), array('action' => 'edit', $error['Error']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Error'), array('action' => 'delete', $error['Error']['id']), null, __('Are you sure you want to delete # %s?', $error['Error']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Errors'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Error'), array('action' => 'add')); ?> </li>
	</ul>
</div>
