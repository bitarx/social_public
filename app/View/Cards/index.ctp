<div class="cards index">
	<h2><?php echo __('Cards'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('height'); ?></th>
			<th><?php echo $this->Paginator->sort('weight'); ?></th>
			<th><?php echo $this->Paginator->sort('size'); ?></th>
			<th><?php echo $this->Paginator->sort('blood'); ?></th>
			<th><?php echo $this->Paginator->sort('rare_level'); ?></th>
			<th><?php echo $this->Paginator->sort('attr'); ?></th>
			<th><?php echo $this->Paginator->sort('hp'); ?></th>
			<th><?php echo $this->Paginator->sort('act'); ?></th>
			<th><?php echo $this->Paginator->sort('def'); ?></th>
			<th><?php echo $this->Paginator->sort('skill_id'); ?></th>
			<th><?php echo $this->Paginator->sort('words'); ?></th>
			<th><?php echo $this->Paginator->sort('detail'); ?></th>
			<th><?php echo $this->Paginator->sort('delete_flg'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($cards as $card): ?>
	<tr>
		<td><?php echo h($card['Card']['id']); ?>&nbsp;</td>
		<td><?php echo h($card['Card']['name']); ?>&nbsp;</td>
		<td><?php echo h($card['Card']['title']); ?>&nbsp;</td>
		<td><?php echo h($card['Card']['height']); ?>&nbsp;</td>
		<td><?php echo h($card['Card']['weight']); ?>&nbsp;</td>
		<td><?php echo h($card['Card']['size']); ?>&nbsp;</td>
		<td><?php echo h($card['Card']['blood']); ?>&nbsp;</td>
		<td><?php echo h($card['Card']['rare_level']); ?>&nbsp;</td>
		<td><?php echo h($card['Card']['attr']); ?>&nbsp;</td>
		<td><?php echo h($card['Card']['hp']); ?>&nbsp;</td>
		<td><?php echo h($card['Card']['act']); ?>&nbsp;</td>
		<td><?php echo h($card['Card']['def']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($card['Skill']['name'], array('controller' => 'skills', 'action' => 'view', $card['Skill']['id'])); ?>
		</td>
		<td><?php echo h($card['Card']['words']); ?>&nbsp;</td>
		<td><?php echo h($card['Card']['detail']); ?>&nbsp;</td>
		<td><?php echo h($card['Card']['delete_flg']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $card['Card']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $card['Card']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $card['Card']['id']), null, __('Are you sure you want to delete # %s?', $card['Card']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Card'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Skills'), array('controller' => 'skills', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Skill'), array('controller' => 'skills', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Card Groups'), array('controller' => 'card_groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Card Group'), array('controller' => 'card_groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Gacha Probs'), array('controller' => 'gacha_probs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gacha Prob'), array('controller' => 'gacha_probs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Collects'), array('controller' => 'user_collects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Collect'), array('controller' => 'user_collects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Gacha Logs'), array('controller' => 'user_gacha_logs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Gacha Log'), array('controller' => 'user_gacha_logs', 'action' => 'add')); ?> </li>
	</ul>
</div>
