<div class="userCards index">
	<h2><?php echo __('User Cards'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('card_id'); ?></th>
			<th><?php echo $this->Paginator->sort('atk'); ?></th>
			<th><?php echo $this->Paginator->sort('def'); ?></th>
			<th><?php echo $this->Paginator->sort('level'); ?></th>
			<th><?php echo $this->Paginator->sort('exp'); ?></th>
			<th><?php echo $this->Paginator->sort('skill_level'); ?></th>
			<th><?php echo $this->Paginator->sort('skill_exp'); ?></th>
			<th><?php echo $this->Paginator->sort('delete_flg'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($userCards as $userCard): ?>
	<tr>
		<td><?php echo h($userCard['UserCard']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($userCard['User']['name'], array('controller' => 'users', 'action' => 'view', $userCard['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($userCard['Card']['title'], array('controller' => 'cards', 'action' => 'view', $userCard['Card']['id'])); ?>
		</td>
		<td><?php echo h($userCard['UserCard']['atk']); ?>&nbsp;</td>
		<td><?php echo h($userCard['UserCard']['def']); ?>&nbsp;</td>
		<td><?php echo h($userCard['UserCard']['level']); ?>&nbsp;</td>
		<td><?php echo h($userCard['UserCard']['exp']); ?>&nbsp;</td>
		<td><?php echo h($userCard['UserCard']['skill_level']); ?>&nbsp;</td>
		<td><?php echo h($userCard['UserCard']['skill_exp']); ?>&nbsp;</td>
		<td><?php echo h($userCard['UserCard']['delete_flg']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $userCard['UserCard']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $userCard['UserCard']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $userCard['UserCard']['id']), null, __('Are you sure you want to delete # %s?', $userCard['UserCard']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New User Card'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cards'), array('controller' => 'cards', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Card'), array('controller' => 'cards', 'action' => 'add')); ?> </li>
	</ul>
</div>
