<div class="userParams index">
	<h2><?php echo __('User Params'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('money'); ?></th>
			<th><?php echo $this->Paginator->sort('act'); ?></th>
			<th><?php echo $this->Paginator->sort('act_max'); ?></th>
			<th><?php echo $this->Paginator->sort('cost_atc'); ?></th>
			<th><?php echo $this->Paginator->sort('cost_def'); ?></th>
			<th><?php echo $this->Paginator->sort('level'); ?></th>
			<th><?php echo $this->Paginator->sort('exp'); ?></th>
			<th><?php echo $this->Paginator->sort('win'); ?></th>
			<th><?php echo $this->Paginator->sort('lose'); ?></th>
			<th><?php echo $this->Paginator->sort('delete_flg'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($userParams as $userParam): ?>
	<tr>
		<td><?php echo h($userParam['UserParam']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($userParam['User']['name'], array('controller' => 'users', 'action' => 'view', $userParam['User']['id'])); ?>
		</td>
		<td><?php echo h($userParam['UserParam']['money']); ?>&nbsp;</td>
		<td><?php echo h($userParam['UserParam']['act']); ?>&nbsp;</td>
		<td><?php echo h($userParam['UserParam']['act_max']); ?>&nbsp;</td>
		<td><?php echo h($userParam['UserParam']['cost_atc']); ?>&nbsp;</td>
		<td><?php echo h($userParam['UserParam']['cost_def']); ?>&nbsp;</td>
		<td><?php echo h($userParam['UserParam']['level']); ?>&nbsp;</td>
		<td><?php echo h($userParam['UserParam']['exp']); ?>&nbsp;</td>
		<td><?php echo h($userParam['UserParam']['win']); ?>&nbsp;</td>
		<td><?php echo h($userParam['UserParam']['lose']); ?>&nbsp;</td>
		<td><?php echo h($userParam['UserParam']['delete_flg']); ?>&nbsp;</td>
		<td><?php echo h($userParam['UserParam']['created']); ?>&nbsp;</td>
		<td><?php echo h($userParam['UserParam']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $userParam['UserParam']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $userParam['UserParam']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $userParam['UserParam']['id']), null, __('Are you sure you want to delete # %s?', $userParam['UserParam']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New User Param'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
