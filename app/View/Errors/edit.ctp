<div class="errors form">
<?php echo $this->Form->create('Error'); ?>
	<fieldset>
		<legend><?php echo __('Edit Error'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('message');
		echo $this->Form->input('delete_flg');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Error.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Error.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Errors'), array('action' => 'index')); ?></li>
	</ul>
</div>
