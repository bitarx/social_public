<div class="rankEvBattles index">
	<h2><?php echo __('Rank Ev Battles'); ?></h2>
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
	<?php foreach ($rankEvBattles as $rankEvBattle): ?>
	<tr>
		<td><?php echo h($rankEvBattle['RankEvBattle']['id']); ?>&nbsp;</td>
		<td><?php echo h($rankEvBattle['RankEvBattle']['rank']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($rankEvBattle['User']['name'], array('controller' => 'users', 'action' => 'view', $rankEvBattle['User']['id'])); ?>
		</td>
		<td><?php echo h($rankEvBattle['RankEvBattle']['point']); ?>&nbsp;</td>
		<td><?php echo h($rankEvBattle['RankEvBattle']['unit']); ?>&nbsp;</td>
		<td><?php echo h($rankEvBattle['RankEvBattle']['delete_flg']); ?>&nbsp;</td>
		<td><?php echo h($rankEvBattle['RankEvBattle']['created']); ?>&nbsp;</td>
		<td><?php echo h($rankEvBattle['RankEvBattle']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $rankEvBattle['RankEvBattle']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $rankEvBattle['RankEvBattle']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $rankEvBattle['RankEvBattle']['id']), null, __('Are you sure you want to delete # %s?', $rankEvBattle['RankEvBattle']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Rank Ev Battle'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
