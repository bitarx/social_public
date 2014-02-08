<div class="enemies index">
	<h2><?php echo __('Enemies'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('hp'); ?></th>
			<th><?php echo $this->Paginator->sort('atk'); ?></th>
			<th><?php echo $this->Paginator->sort('def'); ?></th>
			<th><?php echo $this->Paginator->sort('skill_id'); ?></th>
			<th><?php echo $this->Paginator->sort('before_words'); ?></th>
			<th><?php echo $this->Paginator->sort('after_win_words'); ?></th>
			<th><?php echo $this->Paginator->sort('after_lose_words'); ?></th>
			<th><?php echo $this->Paginator->sort('delete_flg'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($enemies as $enemy): ?>
	<tr>
		<td><?php echo h($enemy['Enemy']['id']); ?>&nbsp;</td>
		<td><?php echo h($enemy['Enemy']['name']); ?>&nbsp;</td>
		<td><?php echo h($enemy['Enemy']['hp']); ?>&nbsp;</td>
		<td><?php echo h($enemy['Enemy']['atk']); ?>&nbsp;</td>
		<td><?php echo h($enemy['Enemy']['def']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($enemy['Skill']['name'], array('controller' => 'skills', 'action' => 'view', $enemy['Skill']['id'])); ?>
		</td>
		<td><?php echo h($enemy['Enemy']['before_words']); ?>&nbsp;</td>
		<td><?php echo h($enemy['Enemy']['after_win_words']); ?>&nbsp;</td>
		<td><?php echo h($enemy['Enemy']['after_lose_words']); ?>&nbsp;</td>
		<td><?php echo h($enemy['Enemy']['delete_flg']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $enemy['Enemy']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $enemy['Enemy']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $enemy['Enemy']['id']), null, __('Are you sure you want to delete # %s?', $enemy['Enemy']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Enemy'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Skills'), array('controller' => 'skills', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Skill'), array('controller' => 'skills', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ev Stages'), array('controller' => 'ev_stages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ev Stage'), array('controller' => 'ev_stages', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stages'), array('controller' => 'stages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stage'), array('controller' => 'stages', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Raids'), array('controller' => 'user_raids', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Raid'), array('controller' => 'user_raids', 'action' => 'add')); ?> </li>
	</ul>
</div>
