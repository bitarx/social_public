<div class="userGachaLogs index">
	<h2><?php echo __('User Gacha Logs'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('gacha_id'); ?></th>
			<th><?php echo $this->Paginator->sort('card_id'); ?></th>
			<th><?php echo $this->Paginator->sort('end_flg'); ?></th>
			<th><?php echo $this->Paginator->sort('delete_flg'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($userGachaLogs as $userGachaLog): ?>
	<tr>
		<td><?php echo h($userGachaLog['UserGachaLog']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($userGachaLog['Gacha']['name'], array('controller' => 'gachas', 'action' => 'view', $userGachaLog['Gacha']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($userGachaLog['Card']['title'], array('controller' => 'cards', 'action' => 'view', $userGachaLog['Card']['id'])); ?>
		</td>
		<td><?php echo h($userGachaLog['UserGachaLog']['end_flg']); ?>&nbsp;</td>
		<td><?php echo h($userGachaLog['UserGachaLog']['delete_flg']); ?>&nbsp;</td>
		<td><?php echo h($userGachaLog['UserGachaLog']['created']); ?>&nbsp;</td>
		<td><?php echo h($userGachaLog['UserGachaLog']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $userGachaLog['UserGachaLog']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $userGachaLog['UserGachaLog']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $userGachaLog['UserGachaLog']['id']), null, __('Are you sure you want to delete # %s?', $userGachaLog['UserGachaLog']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New User Gacha Log'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Gachas'), array('controller' => 'gachas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gacha'), array('controller' => 'gachas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cards'), array('controller' => 'cards', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Card'), array('controller' => 'cards', 'action' => 'add')); ?> </li>
	</ul>
</div>
