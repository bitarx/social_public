<div class="gachas index">
	<h2><?php echo __('Gachas'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('detail'); ?></th>
			<th><?php echo $this->Paginator->sort('start_time'); ?></th>
			<th><?php echo $this->Paginator->sort('end_time'); ?></th>
			<th><?php echo $this->Paginator->sort('delete_flg'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($gachas as $gacha): ?>
	<tr>
		<td><?php echo h($gacha['Gacha']['id']); ?>&nbsp;</td>
		<td><?php echo h($gacha['Gacha']['name']); ?>&nbsp;</td>
		<td><?php echo h($gacha['Gacha']['detail']); ?>&nbsp;</td>
		<td><?php echo h($gacha['Gacha']['start_time']); ?>&nbsp;</td>
		<td><?php echo h($gacha['Gacha']['end_time']); ?>&nbsp;</td>
		<td><?php echo h($gacha['Gacha']['delete_flg']); ?>&nbsp;</td>
		<td><?php echo h($gacha['Gacha']['created']); ?>&nbsp;</td>
		<td><?php echo h($gacha['Gacha']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $gacha['Gacha']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $gacha['Gacha']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $gacha['Gacha']['id']), null, __('Are you sure you want to delete # %s?', $gacha['Gacha']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Gacha'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Gacha Probs'), array('controller' => 'gacha_probs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gacha Prob'), array('controller' => 'gacha_probs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Gacha Days'), array('controller' => 'user_gacha_days', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Gacha Day'), array('controller' => 'user_gacha_days', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Gacha Logs'), array('controller' => 'user_gacha_logs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Gacha Log'), array('controller' => 'user_gacha_logs', 'action' => 'add')); ?> </li>
	</ul>
</div>
