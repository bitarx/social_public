<div class="userRaids index">
	<h2><?php echo __('User Raids'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('raid_id'); ?></th>
			<th><?php echo $this->Paginator->sort('enemy_id'); ?></th>
			<th><?php echo $this->Paginator->sort('hp'); ?></th>
			<th><?php echo $this->Paginator->sort('delete_flg'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($userRaids as $userRaid): ?>
	<tr>
		<td><?php echo h($userRaid['UserRaid']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($userRaid['User']['name'], array('controller' => 'users', 'action' => 'view', $userRaid['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($userRaid['Raid']['name'], array('controller' => 'raids', 'action' => 'view', $userRaid['Raid']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($userRaid['Enemy']['name'], array('controller' => 'enemies', 'action' => 'view', $userRaid['Enemy']['id'])); ?>
		</td>
		<td><?php echo h($userRaid['UserRaid']['hp']); ?>&nbsp;</td>
		<td><?php echo h($userRaid['UserRaid']['delete_flg']); ?>&nbsp;</td>
		<td><?php echo h($userRaid['UserRaid']['created']); ?>&nbsp;</td>
		<td><?php echo h($userRaid['UserRaid']['updated']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $userRaid['UserRaid']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $userRaid['UserRaid']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $userRaid['UserRaid']['id']), null, __('Are you sure you want to delete # %s?', $userRaid['UserRaid']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New User Raid'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Raids'), array('controller' => 'raids', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Raid'), array('controller' => 'raids', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Enemies'), array('controller' => 'enemies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Enemy'), array('controller' => 'enemies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Raid Logs'), array('controller' => 'user_raid_logs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Raid Log'), array('controller' => 'user_raid_logs', 'action' => 'add')); ?> </li>
	</ul>
</div>
