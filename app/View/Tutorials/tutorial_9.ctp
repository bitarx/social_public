<div class="tutorials index">
	<h2><?php echo __('Tutorials'); ?></h2>
    <?= $row['title']; ?><br />
    <?= $row['words']; ?><br />
    <?= $row['words2']; ?><br />
    <?= $row['words3']; ?><br />
				<?php echo $this->Html->link(__('Index'), array('action' => $next)); ?>
</div>
