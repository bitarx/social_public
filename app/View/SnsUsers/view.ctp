<div class="snsUsers view">
<h2><?php echo __('Sns User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($snsUser['SnsUser']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Viewer'); ?></dt>
		<dd>
			<?php echo h($snsUser['SnsUser']['viewer']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sns Name'); ?></dt>
		<dd>
			<?php echo h($snsUser['SnsUser']['sns_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Delete Flg'); ?></dt>
		<dd>
			<?php echo h($snsUser['SnsUser']['delete_flg']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($snsUser['SnsUser']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($snsUser['SnsUser']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Sns User'), array('action' => 'edit', $snsUser['SnsUser']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Sns User'), array('action' => 'delete', $snsUser['SnsUser']['id']), null, __('Are you sure you want to delete # %s?', $snsUser['SnsUser']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Sns Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sns User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Users'); ?></h3>
	<?php if (!empty($snsUser['User'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Sns User Id'); ?></th>
		<th><?php echo __('Carrer'); ?></th>
		<th><?php echo __('Delete Flg'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($snsUser['User'] as $user): ?>
		<tr>
			<td><?php echo $user['id']; ?></td>
			<td><?php echo $user['name']; ?></td>
			<td><?php echo $user['sns_user_id']; ?></td>
			<td><?php echo $user['carrer']; ?></td>
			<td><?php echo $user['delete_flg']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users', 'action' => 'delete', $user['id']), null, __('Are you sure you want to delete # %s?', $user['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
