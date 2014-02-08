<div class="userLoginAllLogs index">
	<h2><?php echo __('User Login All Logs'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('kind'); ?></th>
			<th><?php echo $this->Paginator->sort('target'); ?></th>
			<th><?php echo $this->Paginator->sort('delete_flg'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($userLoginAllLogs as $userLoginAllLog): ?>
	<tr>
		<td><?php echo h($userLoginAllLog['UserLoginAllLog']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($userLoginAllLog['User']['name'], array('controller' => 'users', 'action' => 'view', $userLoginAllLog['User']['id'])); ?>
		</td>
		<td><?php echo h($userLoginAllLog['UserLoginAllLog']['kind']); ?>&nbsp;</td>
		<td><?php echo h($userLoginAllLog['UserLoginAllLog']['target']); ?>&nbsp;</td>
		<td><?php echo h($userLoginAllLog['UserLoginAllLog']['delete_flg']); ?>&nbsp;</td>
		<td><?php echo h($userLoginAllLog['UserLoginAllLog']['created']); ?>&nbsp;</td>
		<td><?php echo h($userLoginAllLog['UserLoginAllLog']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $userLoginAllLog['UserLoginAllLog']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $userLoginAllLog['UserLoginAllLog']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $userLoginAllLog['UserLoginAllLog']['id']), null, __('Are you sure you want to delete # %s?', $userLoginAllLog['UserLoginAllLog']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New User Login All Log'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
