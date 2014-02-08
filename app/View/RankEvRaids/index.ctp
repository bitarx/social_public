<div class="rankEvRaids index">
	<h2><?php echo __('Rank Ev Raids'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('rank'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('point'); ?></th>
			<th><?php echo $this->Paginator->sort('unit'); ?></th>
			<th><?php echo $this->Paginator->sort('delete_flg'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($rankEvRaids as $rankEvRaid): ?>
	<tr>
		<td><?php echo h($rankEvRaid['RankEvRaid']['id']); ?>&nbsp;</td>
		<td><?php echo h($rankEvRaid['RankEvRaid']['rank']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($rankEvRaid['User']['name'], array('controller' => 'users', 'action' => 'view', $rankEvRaid['User']['id'])); ?>
		</td>
		<td><?php echo h($rankEvRaid['RankEvRaid']['point']); ?>&nbsp;</td>
		<td><?php echo h($rankEvRaid['RankEvRaid']['unit']); ?>&nbsp;</td>
		<td><?php echo h($rankEvRaid['RankEvRaid']['delete_flg']); ?>&nbsp;</td>
		<td><?php echo h($rankEvRaid['RankEvRaid']['created']); ?>&nbsp;</td>
		<td><?php echo h($rankEvRaid['RankEvRaid']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $rankEvRaid['RankEvRaid']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $rankEvRaid['RankEvRaid']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $rankEvRaid['RankEvRaid']['id']), null, __('Are you sure you want to delete # %s?', $rankEvRaid['RankEvRaid']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Rank Ev Raid'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
