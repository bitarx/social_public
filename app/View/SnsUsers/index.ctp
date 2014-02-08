<div class="snsUsers index">
	<h2><?php echo __('Sns Users'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('viewer'); ?></th>
			<th><?php echo $this->Paginator->sort('sns_name'); ?></th>
			<th><?php echo $this->Paginator->sort('delete_flg'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($snsUsers as $snsUser): ?>
	<tr>
		<td><?php echo h($snsUser['SnsUser']['id']); ?>&nbsp;</td>
		<td><?php echo h($snsUser['SnsUser']['viewer']); ?>&nbsp;</td>
		<td><?php echo h($snsUser['SnsUser']['sns_name']); ?>&nbsp;</td>
		<td><?php echo h($snsUser['SnsUser']['delete_flg']); ?>&nbsp;</td>
		<td><?php echo h($snsUser['SnsUser']['created']); ?>&nbsp;</td>
		<td><?php echo h($snsUser['SnsUser']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $snsUser['SnsUser']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $snsUser['SnsUser']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $snsUser['SnsUser']['id']), null, __('Are you sure you want to delete # %s?', $snsUser['SnsUser']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Sns User'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
