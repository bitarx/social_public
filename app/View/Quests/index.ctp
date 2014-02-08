<div class="quests index">
	<h2><?php echo __('Quests'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('detail'); ?></th>
			<th><?php echo $this->Paginator->sort('detail_before1'); ?></th>
			<th><?php echo $this->Paginator->sort('detail_before2'); ?></th>
			<th><?php echo $this->Paginator->sort('detail_after'); ?></th>
			<th><?php echo $this->Paginator->sort('delete_flg'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($quests as $quest): ?>
	<tr>
		<td><?php echo h($quest['Quest']['id']); ?>&nbsp;</td>
		<td><?php echo h($quest['Quest']['title']); ?>&nbsp;</td>
		<td><?php echo h($quest['Quest']['detail']); ?>&nbsp;</td>
		<td><?php echo h($quest['Quest']['detail_before1']); ?>&nbsp;</td>
		<td><?php echo h($quest['Quest']['detail_before2']); ?>&nbsp;</td>
		<td><?php echo h($quest['Quest']['detail_after']); ?>&nbsp;</td>
		<td><?php echo h($quest['Quest']['delete_flg']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $quest['Quest']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $quest['Quest']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $quest['Quest']['id']), null, __('Are you sure you want to delete # %s?', $quest['Quest']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Quest'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Stages'), array('controller' => 'stages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stage'), array('controller' => 'stages', 'action' => 'add')); ?> </li>
	</ul>
</div>
