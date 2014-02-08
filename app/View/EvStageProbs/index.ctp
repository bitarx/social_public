<div class="evStageProbs index">
	<h2><?php echo __('Ev Stage Probs'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('ev_stage_id'); ?></th>
			<th><?php echo $this->Paginator->sort('kind'); ?></th>
			<th><?php echo $this->Paginator->sort('target'); ?></th>
			<th><?php echo $this->Paginator->sort('num'); ?></th>
			<th><?php echo $this->Paginator->sort('prob'); ?></th>
			<th><?php echo $this->Paginator->sort('delete_flg'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($evStageProbs as $evStageProb): ?>
	<tr>
		<td><?php echo h($evStageProb['EvStageProb']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($evStageProb['EvStage']['title'], array('controller' => 'ev_stages', 'action' => 'view', $evStageProb['EvStage']['id'])); ?>
		</td>
		<td><?php echo h($evStageProb['EvStageProb']['kind']); ?>&nbsp;</td>
		<td><?php echo h($evStageProb['EvStageProb']['target']); ?>&nbsp;</td>
		<td><?php echo h($evStageProb['EvStageProb']['num']); ?>&nbsp;</td>
		<td><?php echo h($evStageProb['EvStageProb']['prob']); ?>&nbsp;</td>
		<td><?php echo h($evStageProb['EvStageProb']['delete_flg']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $evStageProb['EvStageProb']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $evStageProb['EvStageProb']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $evStageProb['EvStageProb']['id']), null, __('Are you sure you want to delete # %s?', $evStageProb['EvStageProb']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Ev Stage Prob'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Ev Stages'), array('controller' => 'ev_stages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ev Stage'), array('controller' => 'ev_stages', 'action' => 'add')); ?> </li>
	</ul>
</div>
