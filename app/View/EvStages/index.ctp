<div class="evStages index">
	<h2><?php echo __('Ev Stages'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('ev_quest_id'); ?></th>
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
	<?php foreach ($evStages as $evStage): ?>
	<tr>
		<td><?php echo h($evStage['EvStage']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($evStage['EvQuest']['title'], array('controller' => 'ev_quests', 'action' => 'view', $evStage['EvQuest']['id'])); ?>
		</td>
		<td><?php echo h($evStage['EvStage']['title']); ?>&nbsp;</td>
		<td><?php echo h($evStage['EvStage']['boss_before']); ?>&nbsp;</td>
		<td><?php echo h($evStage['EvStage']['boss_after']); ?>&nbsp;</td>
		<td><?php echo h($evStage['EvStage']['use_act']); ?>&nbsp;</td>
		<td><?php echo h($evStage['EvStage']['prob_get']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($evStage['Enemy']['name'], array('controller' => 'enemies', 'action' => 'view', $evStage['Enemy']['id'])); ?>
		</td>
		<td><?php echo h($evStage['EvStage']['delete_flg']); ?>&nbsp;</td>
		<td><?php echo h($evStage['EvStage']['created']); ?>&nbsp;</td>
		<td><?php echo h($evStage['EvStage']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $evStage['EvStage']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $evStage['EvStage']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $evStage['EvStage']['id']), null, __('Are you sure you want to delete # %s?', $evStage['EvStage']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Ev Stage'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Ev Quests'), array('controller' => 'ev_quests', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ev Quest'), array('controller' => 'ev_quests', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Enemies'), array('controller' => 'enemies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Enemy'), array('controller' => 'enemies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ev Stage Probs'), array('controller' => 'ev_stage_probs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ev Stage Prob'), array('controller' => 'ev_stage_probs', 'action' => 'add')); ?> </li>
	</ul>
</div>
