<div class="skills index">
	<h2><?php echo __('Skills'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('effect'); ?></th>
			<th><?php echo $this->Paginator->sort('updown'); ?></th>
			<th><?php echo $this->Paginator->sort('target'); ?></th>
			<th><?php echo $this->Paginator->sort('percent'); ?></th>
			<th><?php echo $this->Paginator->sort('words'); ?></th>
			<th><?php echo $this->Paginator->sort('delete_flg'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($skills as $skill): ?>
	<tr>
		<td><?php echo h($skill['Skill']['id']); ?>&nbsp;</td>
		<td><?php echo h($skill['Skill']['name']); ?>&nbsp;</td>
		<td><?php echo h($skill['Skill']['effect']); ?>&nbsp;</td>
		<td><?php echo h($skill['Skill']['updown']); ?>&nbsp;</td>
		<td><?php echo h($skill['Skill']['target']); ?>&nbsp;</td>
		<td><?php echo h($skill['Skill']['percent']); ?>&nbsp;</td>
		<td><?php echo h($skill['Skill']['words']); ?>&nbsp;</td>
		<td><?php echo h($skill['Skill']['delete_flg']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $skill['Skill']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $skill['Skill']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $skill['Skill']['id']), null, __('Are you sure you want to delete # %s?', $skill['Skill']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Skill'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Cards'), array('controller' => 'cards', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Card'), array('controller' => 'cards', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Enemies'), array('controller' => 'enemies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Enemy'), array('controller' => 'enemies', 'action' => 'add')); ?> </li>
	</ul>
</div>
