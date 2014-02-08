<div class="battleLogs index">
	<h2><?php echo __('Battle Logs'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('target_user'); ?></th>
			<th><?php echo $this->Paginator->sort('result'); ?></th>
			<th><?php echo $this->Paginator->sort('log'); ?></th>
			<th><?php echo $this->Paginator->sort('delete_flg'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($battleLogs as $battleLog): ?>
	<tr>
		<td><?php echo h($battleLog['BattleLog']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($battleLog['User']['name'], array('controller' => 'users', 'action' => 'view', $battleLog['User']['id'])); ?>
		</td>
		<td><?php echo h($battleLog['BattleLog']['target_user']); ?>&nbsp;</td>
		<td><?php echo h($battleLog['BattleLog']['result']); ?>&nbsp;</td>
		<td><?php echo h($battleLog['BattleLog']['log']); ?>&nbsp;</td>
		<td><?php echo h($battleLog['BattleLog']['delete_flg']); ?>&nbsp;</td>
		<td><?php echo h($battleLog['BattleLog']['created']); ?>&nbsp;</td>
		<td><?php echo h($battleLog['BattleLog']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $battleLog['BattleLog']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $battleLog['BattleLog']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $battleLog['BattleLog']['id']), null, __('Are you sure you want to delete # %s?', $battleLog['BattleLog']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Battle Log'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
