<div class="userStages index">
	<h2><?php echo __('User Stages'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('stage_id'); ?></th>
			<th><?php echo $this->Paginator->sort('progress'); ?></th>
			<th><?php echo $this->Paginator->sort('state'); ?></th>
			<th><?php echo $this->Paginator->sort('delete_flg'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($userStages as $userStage): ?>
	<tr>
		<td><?php echo h($userStage['UserStage']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($userStage['User']['name'], array('controller' => 'users', 'action' => 'view', $userStage['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($userStage['Stage']['title'], array('controller' => 'stages', 'action' => 'view', $userStage['Stage']['id'])); ?>
		</td>
		<td><?php echo h($userStage['UserStage']['progress']); ?>&nbsp;</td>
		<td><?php echo h($userStage['UserStage']['state']); ?>&nbsp;</td>
		<td><?php echo h($userStage['UserStage']['delete_flg']); ?>&nbsp;</td>
		<td><?php echo h($userStage['UserStage']['created']); ?>&nbsp;</td>
		<td><?php echo h($userStage['UserStage']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $userStage['UserStage']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $userStage['UserStage']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $userStage['UserStage']['id']), null, __('Are you sure you want to delete # %s?', $userStage['UserStage']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New User Stage'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stages'), array('controller' => 'stages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stage'), array('controller' => 'stages', 'action' => 'add')); ?> </li>
	</ul>
</div>
