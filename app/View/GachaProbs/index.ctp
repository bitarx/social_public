<div class="gachaProbs index">
	<h2><?php echo __('Gacha Probs'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('gacha_id'); ?></th>
			<th><?php echo $this->Paginator->sort('card_id'); ?></th>
			<th><?php echo $this->Paginator->sort('prob'); ?></th>
			<th><?php echo $this->Paginator->sort('delete_flg'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($gachaProbs as $gachaProb): ?>
	<tr>
		<td><?php echo h($gachaProb['GachaProb']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($gachaProb['Gacha']['name'], array('controller' => 'gachas', 'action' => 'view', $gachaProb['Gacha']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($gachaProb['Card']['title'], array('controller' => 'cards', 'action' => 'view', $gachaProb['Card']['id'])); ?>
		</td>
		<td><?php echo h($gachaProb['GachaProb']['prob']); ?>&nbsp;</td>
		<td><?php echo h($gachaProb['GachaProb']['delete_flg']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $gachaProb['GachaProb']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $gachaProb['GachaProb']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $gachaProb['GachaProb']['id']), null, __('Are you sure you want to delete # %s?', $gachaProb['GachaProb']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Gacha Prob'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Gachas'), array('controller' => 'gachas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gacha'), array('controller' => 'gachas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cards'), array('controller' => 'cards', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Card'), array('controller' => 'cards', 'action' => 'add')); ?> </li>
	</ul>
</div>
