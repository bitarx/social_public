<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('main');
        echo $this->Html->script( 'jquery-2.1.0.min.js', array( 'inline' => false ) );
        echo $this->Html->script('jquery.leanModal.min.js');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div class="header">
		    <?=	$this->Html->image('header_base.png', array('alt' => $cakeDescription, 'border' => '0', 'width' => '663px')); ?>
		</div>
		<div class="btn_my">
		    <?= $this->Html->link(	
                    $this->Html->image('btn_my_on.png', array('alt' => $cakeDescription, 'border' => '0')) 
                ,   array('controller' => 'Users' , 'action' => 'index')
                ,   array('escape' => false)
                );
            ?>
		    <?= $this->Html->link(	
                    $this->Html->image('btn_synth_on.png', array('alt' => $cakeDescription, 'border' => '0'))
                ,   array('controller' => 'UserCards' , 'action' => 'index')
                ,   array('escape' => false)
                );
            ?>
		    <?= $this->Html->link(	
                    $this->Html->image('btn_quest_on.png', array('alt' => $cakeDescription, 'border' => '0'))
                ,   array('controller' => 'Quests' , 'action' => 'index')
                ,   array('escape' => false)
                );
            ?>
		    <?= $this->Html->link(	
                    $this->Html->image('btn_gacha_on.png', array('alt' => $cakeDescription, 'border' => '0'))
                ,   array('controller' => 'Gachas' , 'action' => 'index')
                ,   array('escape' => false)
                );
            ?>

		    <?=	$this->Html->image('btn_menu_on.png', array('alt' => $cakeDescription, 'border' => '0')); ?>
		</div>
		<div id="content">


            <a rel="leanModal" href="#div787">Edit</a>
            <div id="div787"><<モーダルウィンドウ内に表示する要素>></div>

            <script type="text/javascript">
            $(function() {
                $( 'a[rel*=leanModal]').leanModal({
                    top: 50,                     // モーダルウィンドウの縦位置を指定
                    overlay : 0.5,               // 背面の透明度 
                    closeButton: ".modal_close"  // 閉じるボタンのCSS classを指定
                });
            }); 
            </script>

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
