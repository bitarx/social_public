<div class="raids index">
	<h2><?php echo __('Raids'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('start_time'); ?></th>
			<th><?php echo $this->Paginator->sort('end_time'); ?></th>
			<th><?php echo $this->Paginator->sort('delete_flg'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($raids as $raid): ?>
	<tr>
		<td><?php echo h($raid['Raid']['id']); ?>&nbsp;</td>
		<td><?php echo h($raid['Raid']['name']); ?>&nbsp;</td>
		<td><?php echo h($raid['Raid']['start_time']); ?>&nbsp;</td>
		<td><?php echo h($raid['Raid']['end_time']); ?>&nbsp;</td>
		<td><?php echo h($raid['Raid']['delete_flg']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $raid['Raid']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $raid['Raid']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $raid['Raid']['id']), null, __('Are you sure you want to delete # %s?', $raid['Raid']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Raid'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Stage Probs'), array('controller' => 'stage_probs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stage Prob'), array('controller' => 'stage_probs', 'action' => 'add')); ?> </li>
	</ul>
</div>
