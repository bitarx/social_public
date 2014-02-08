<div class="users index">
	<h2><?php echo __('Users'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('sns_user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('carrer'); ?></th>
			<th><?php echo $this->Paginator->sort('delete_flg'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($users as $user): ?>
	<tr>
		<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($user['SnsUser']['id'], array('controller' => 'sns_users', 'action' => 'view', $user['SnsUser']['id'])); ?>
		</td>
		<td><?php echo h($user['User']['carrer']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['delete_flg']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Sns Users'), array('controller' => 'sns_users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sns User'), array('controller' => 'sns_users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Battle Logs'), array('controller' => 'battle_logs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Battle Log'), array('controller' => 'battle_logs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Friends'), array('controller' => 'friends', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Friend'), array('controller' => 'friends', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Messages'), array('controller' => 'messages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Message'), array('controller' => 'messages', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Rank Ev Battles'), array('controller' => 'rank_ev_battles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rank Ev Battle'), array('controller' => 'rank_ev_battles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Rank Ev Raids'), array('controller' => 'rank_ev_raids', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rank Ev Raid'), array('controller' => 'rank_ev_raids', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Cards'), array('controller' => 'user_cards', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Card'), array('controller' => 'user_cards', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Collects'), array('controller' => 'user_collects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Collect'), array('controller' => 'user_collects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Cur Stages'), array('controller' => 'user_cur_stages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Cur Stage'), array('controller' => 'user_cur_stages', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Deck Cards'), array('controller' => 'user_deck_cards', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Deck Card'), array('controller' => 'user_deck_cards', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Decks'), array('controller' => 'user_decks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Deck'), array('controller' => 'user_decks', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Ev Stages'), array('controller' => 'user_ev_stages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Ev Stage'), array('controller' => 'user_ev_stages', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Gacha Days'), array('controller' => 'user_gacha_days', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Gacha Day'), array('controller' => 'user_gacha_days', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Login All Logs'), array('controller' => 'user_login_all_logs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Login All Log'), array('controller' => 'user_login_all_logs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Login Days'), array('controller' => 'user_login_days', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Login Day'), array('controller' => 'user_login_days', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Login Logs'), array('controller' => 'user_login_logs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Login Log'), array('controller' => 'user_login_logs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Params'), array('controller' => 'user_params', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Param'), array('controller' => 'user_params', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Present Boxes'), array('controller' => 'user_present_boxes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Present Box'), array('controller' => 'user_present_boxes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Profs'), array('controller' => 'user_profs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Prof'), array('controller' => 'user_profs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Raid Logs'), array('controller' => 'user_raid_logs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Raid Log'), array('controller' => 'user_raid_logs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Raids'), array('controller' => 'user_raids', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Raid'), array('controller' => 'user_raids', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Stages'), array('controller' => 'user_stages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Stage'), array('controller' => 'user_stages', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Tutorials'), array('controller' => 'user_tutorials', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Tutorial'), array('controller' => 'user_tutorials', 'action' => 'add')); ?> </li>
	</ul>
</div>
