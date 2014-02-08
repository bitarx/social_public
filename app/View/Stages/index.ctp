<div class="stages index">
	<h2><?php echo __('Stages'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('quest_id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('boss_before'); ?></th>
			<th><?php echo $this->Paginator->sort('boss_after'); ?></th>
			<th><?php echo $this->Paginator->sort('use_act'); ?></th>
			<th><?php echo $this->Paginator->sort('prob_get'); ?></th>
			<th><?php echo $this->Paginator->sort('enemy_id'); ?></th>
			<th><?php echo $this->Paginator->sort('delete_flg'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($stages as $stage): ?>
	<tr>
		<td><?php echo h($stage['Stage']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($stage['Quest']['title'], array('controller' => 'quests', 'action' => 'view', $stage['Quest']['id'])); ?>
		</td>
		<td><?php echo h($stage['Stage']['title']); ?>&nbsp;</td>
		<td><?php echo h($stage['Stage']['boss_before']); ?>&nbsp;</td>
		<td><?php echo h($stage['Stage']['boss_after']); ?>&nbsp;</td>
		<td><?php echo h($stage['Stage']['use_act']); ?>&nbsp;</td>
		<td><?php echo h($stage['Stage']['prob_get']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($stage['Enemy']['name'], array('controller' => 'enemies', 'action' => 'view', $stage['Enemy']['id'])); ?>
		</td>
		<td><?php echo h($stage['Stage']['delete_flg']); ?>&nbsp;</td>
		<td><?php echo h($stage['Stage']['created']); ?>&nbsp;</td>
		<td><?php echo h($stage['Stage']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $stage['Stage']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $stage['Stage']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $stage['Stage']['id']), null, __('Are you sure you want to delete # %s?', $stage['Stage']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Stage'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Quests'), array('controller' => 'quests', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Quest'), array('controller' => 'quests', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Enemies'), array('controller' => 'enemies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Enemy'), array('controller' => 'enemies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stage Probs'), array('controller' => 'stage_probs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stage Prob'), array('controller' => 'stage_probs', 'action' => 'add')); ?> </li>
	</ul>
</div>
