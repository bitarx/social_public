<div class="itemProbs index">
	<h2><?php echo __('Item Probs'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('item_id'); ?></th>
			<th><?php echo $this->Paginator->sort('prob'); ?></th>
			<th><?php echo $this->Paginator->sort('kind'); ?></th>
			<th><?php echo $this->Paginator->sort('target'); ?></th>
			<th><?php echo $this->Paginator->sort('num'); ?></th>
			<th><?php echo $this->Paginator->sort('delete_flg'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($itemProbs as $itemProb): ?>
	<tr>
		<td><?php echo h($itemProb['ItemProb']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($itemProb['Item']['name'], array('controller' => 'items', 'action' => 'view', $itemProb['Item']['id'])); ?>
		</td>
		<td><?php echo h($itemProb['ItemProb']['prob']); ?>&nbsp;</td>
		<td><?php echo h($itemProb['ItemProb']['kind']); ?>&nbsp;</td>
		<td><?php echo h($itemProb['ItemProb']['target']); ?>&nbsp;</td>
		<td><?php echo h($itemProb['ItemProb']['num']); ?>&nbsp;</td>
		<td><?php echo h($itemProb['ItemProb']['delete_flg']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $itemProb['ItemProb']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $itemProb['ItemProb']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $itemProb['ItemProb']['id']), null, __('Are you sure you want to delete # %s?', $itemProb['ItemProb']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Item Prob'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Items'), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item'), array('controller' => 'items', 'action' => 'add')); ?> </li>
	</ul>
</div>
