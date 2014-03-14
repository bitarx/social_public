<div class="tutorials index">
	<h2><?php echo __('Tutorials'); ?></h2>
    <?= $row['tutorial_title']; ?><br />
    <?= $row['tutorial_words']; ?><br />
    <?= $row['tutorial_words2']; ?><br />
    <?= $row['tutorial_words3']; ?><br />
				<?php echo $this->Html->link(__('Index'), array('action' => $next)); ?>
</div>
