<div class="stageProbs index">
	<h2><?php echo __('Stage Probs'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('stage_id'); ?></th>
			<th><?php echo $this->Paginator->sort('raid_id'); ?></th>
			<th><?php echo $this->Paginator->sort('kind'); ?></th>
			<th><?php echo $this->Paginator->sort('target'); ?></th>
			<th><?php echo $this->Paginator->sort('num'); ?></th>
			<th><?php echo $this->Paginator->sort('prob'); ?></th>
			<th><?php echo $this->Paginator->sort('delete_flg'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($stageProbs as $stageProb): ?>
	<tr>
		<td><?php echo h($stageProb['StageProb']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($stageProb['Stage']['title'], array('controller' => 'stages', 'action' => 'view', $stageProb['Stage']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($stageProb['Raid']['name'], array('controller' => 'raids', 'action' => 'view', $stageProb['Raid']['id'])); ?>
		</td>
		<td><?php echo h($stageProb['StageProb']['kind']); ?>&nbsp;</td>
		<td><?php echo h($stageProb['StageProb']['target']); ?>&nbsp;</td>
		<td><?php echo h($stageProb['StageProb']['num']); ?>&nbsp;</td>
		<td><?php echo h($stageProb['StageProb']['prob']); ?>&nbsp;</td>
		<td><?php echo h($stageProb['StageProb']['delete_flg']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $stageProb['StageProb']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $stageProb['StageProb']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $stageProb['StageProb']['id']), null, __('Are you sure you want to delete # %s?', $stageProb['StageProb']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Stage Prob'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Stages'), array('controller' => 'stages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stage'), array('controller' => 'stages', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Raids'), array('controller' => 'raids', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Raid'), array('controller' => 'raids', 'action' => 'add')); ?> </li>
	</ul>
</div>
