<div class="userTutorials index">
	<h2><?php echo __('User Tutorials'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('tutorial_id'); ?></th>
			<th><?php echo $this->Paginator->sort('end_flg'); ?></th>
			<th><?php echo $this->Paginator->sort('delete_flg'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($userTutorials as $userTutorial): ?>
	<tr>
		<td><?php echo h($userTutorial['UserTutorial']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($userTutorial['User']['name'], array('controller' => 'users', 'action' => 'view', $userTutorial['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($userTutorial['Tutorial']['title'], array('controller' => 'tutorials', 'action' => 'view', $userTutorial['Tutorial']['id'])); ?>
		</td>
		<td><?php echo h($userTutorial['UserTutorial']['end_flg']); ?>&nbsp;</td>
		<td><?php echo h($userTutorial['UserTutorial']['delete_flg']); ?>&nbsp;</td>
		<td><?php echo h($userTutorial['UserTutorial']['created']); ?>&nbsp;</td>
		<td><?php echo h($userTutorial['UserTutorial']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $userTutorial['UserTutorial']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $userTutorial['UserTutorial']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $userTutorial['UserTutorial']['id']), null, __('Are you sure you want to delete # %s?', $userTutorial['UserTutorial']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New User Tutorial'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tutorials'), array('controller' => 'tutorials', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tutorial'), array('controller' => 'tutorials', 'action' => 'add')); ?> </li>
	</ul>
</div>
