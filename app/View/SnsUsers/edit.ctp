<div class="snsUsers form">
<?php echo $this->Form->create('SnsUser'); ?>
	<fieldset>
		<legend><?php echo __('Edit Sns User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('viewer');
		echo $this->Form->input('sns_name');
		echo $this->Form->input('delete_flg');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('SnsUser.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('SnsUser.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Sns Users'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
