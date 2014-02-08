<div class="itemEffects index">
	<h2><?php echo __('Item Effects'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('detail'); ?></th>
			<th><?php echo $this->Paginator->sort('detail_after'); ?></th>
			<th><?php echo $this->Paginator->sort('effect'); ?></th>
			<th><?php echo $this->Paginator->sort('percent'); ?></th>
			<th><?php echo $this->Paginator->sort('delete_flg'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($itemEffects as $itemEffect): ?>
	<tr>
		<td><?php echo h($itemEffect['ItemEffect']['id']); ?>&nbsp;</td>
		<td><?php echo h($itemEffect['ItemEffect']['detail']); ?>&nbsp;</td>
		<td><?php echo h($itemEffect['ItemEffect']['detail_after']); ?>&nbsp;</td>
		<td><?php echo h($itemEffect['ItemEffect']['effect']); ?>&nbsp;</td>
		<td><?php echo h($itemEffect['ItemEffect']['percent']); ?>&nbsp;</td>
		<td><?php echo h($itemEffect['ItemEffect']['delete_flg']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $itemEffect['ItemEffect']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $itemEffect['ItemEffect']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $itemEffect['ItemEffect']['id']), null, __('Are you sure you want to delete # %s?', $itemEffect['ItemEffect']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Item Effect'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Items'), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item'), array('controller' => 'items', 'action' => 'add')); ?> </li>
	</ul>
</div>
