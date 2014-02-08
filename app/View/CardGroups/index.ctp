<div class="cardGroups index">
	<h2><?php echo __('Card Groups'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('evol_group'); ?></th>
			<th><?php echo $this->Paginator->sort('card_id'); ?></th>
			<th><?php echo $this->Paginator->sort('next'); ?></th>
			<th><?php echo $this->Paginator->sort('prev'); ?></th>
			<th><?php echo $this->Paginator->sort('delete_flg'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($cardGroups as $cardGroup): ?>
	<tr>
		<td><?php echo h($cardGroup['CardGroup']['id']); ?>&nbsp;</td>
		<td><?php echo h($cardGroup['CardGroup']['evol_group']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($cardGroup['Card']['title'], array('controller' => 'cards', 'action' => 'view', $cardGroup['Card']['id'])); ?>
		</td>
		<td><?php echo h($cardGroup['CardGroup']['next']); ?>&nbsp;</td>
		<td><?php echo h($cardGroup['CardGroup']['prev']); ?>&nbsp;</td>
		<td><?php echo h($cardGroup['CardGroup']['delete_flg']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $cardGroup['CardGroup']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $cardGroup['CardGroup']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $cardGroup['CardGroup']['id']), null, __('Are you sure you want to delete # %s?', $cardGroup['CardGroup']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Card Group'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Cards'), array('controller' => 'cards', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Card'), array('controller' => 'cards', 'action' => 'add')); ?> </li>
	</ul>
</div>
