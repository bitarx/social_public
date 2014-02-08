<div class="userCollects index">
	<h2><?php echo __('User Collects'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('card_id'); ?></th>
			<th><?php echo $this->Paginator->sort('new_flg'); ?></th>
			<th><?php echo $this->Paginator->sort('delete_flg'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($userCollects as $userCollect): ?>
	<tr>
		<td><?php echo h($userCollect['UserCollect']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($userCollect['User']['name'], array('controller' => 'users', 'action' => 'view', $userCollect['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($userCollect['Card']['title'], array('controller' => 'cards', 'action' => 'view', $userCollect['Card']['id'])); ?>
		</td>
		<td><?php echo h($userCollect['UserCollect']['new_flg']); ?>&nbsp;</td>
		<td><?php echo h($userCollect['UserCollect']['delete_flg']); ?>&nbsp;</td>
		<td><?php echo h($userCollect['UserCollect']['created']); ?>&nbsp;</td>
		<td><?php echo h($userCollect['UserCollect']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $userCollect['UserCollect']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $userCollect['UserCollect']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $userCollect['UserCollect']['id']), null, __('Are you sure you want to delete # %s?', $userCollect['UserCollect']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New User Collect'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cards'), array('controller' => 'cards', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Card'), array('controller' => 'cards', 'action' => 'add')); ?> </li>
	</ul>
</div>
