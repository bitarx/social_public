<div class="userPresentBoxes index">
	<h2><?php echo __('User Present Boxes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('kind'); ?></th>
			<th><?php echo $this->Paginator->sort('target'); ?></th>
			<th><?php echo $this->Paginator->sort('message'); ?></th>
			<th><?php echo $this->Paginator->sort('delete_flg'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($userPresentBoxes as $userPresentBox): ?>
	<tr>
		<td><?php echo h($userPresentBox['UserPresentBox']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($userPresentBox['User']['name'], array('controller' => 'users', 'action' => 'view', $userPresentBox['User']['id'])); ?>
		</td>
		<td><?php echo h($userPresentBox['UserPresentBox']['kind']); ?>&nbsp;</td>
		<td><?php echo h($userPresentBox['UserPresentBox']['target']); ?>&nbsp;</td>
		<td><?php echo h($userPresentBox['UserPresentBox']['message']); ?>&nbsp;</td>
		<td><?php echo h($userPresentBox['UserPresentBox']['delete_flg']); ?>&nbsp;</td>
		<td><?php echo h($userPresentBox['UserPresentBox']['created']); ?>&nbsp;</td>
		<td><?php echo h($userPresentBox['UserPresentBox']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $userPresentBox['UserPresentBox']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $userPresentBox['UserPresentBox']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $userPresentBox['UserPresentBox']['id']), null, __('Are you sure you want to delete # %s?', $userPresentBox['UserPresentBox']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New User Present Box'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
