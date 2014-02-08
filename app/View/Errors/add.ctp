<div class="errors form">
<?php echo $this->Form->create('Error'); ?>
	<fieldset>
		<legend><?php echo __('Add Error'); ?></legend>
	<?php
		echo $this->Form->input('message');
		echo $this->Form->input('delete_flg');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Errors'), array('action' => 'index')); ?></li>
	</ul>
</div>
