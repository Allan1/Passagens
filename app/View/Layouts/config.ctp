<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'Cyhelpme');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
                echo $this->Html->script('jquery-1.9.1.min');
		echo $this->Html->css('cake.generic');
                
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1 style="float: left"><?php echo $this->Html->link($cakeDescription, '/'); ?></h1>
                        <h1 style="float: right; background: none">
                            <?php 
                                if($this->Session->read('Auth.User.id'))
                                    echo $this->Html->link('sair',array('controller'=>'users','action'=>'logout'));
                                else
                                    echo $this->Html->link('entrar',array('controller'=>'users','action'=>'login'));
                            ?>
                        </h1>
                        <div style="clear: both"></div>
		</div>
		<div id="content">
                    <?php if($this->Session->read('Auth.User.id')): ?>
                        <ul id="config">
                            <li><?php echo $this->Html->link('cidades', array('controller' => 'cities', 'action' => 'index')); ?>
                            </li>
                            <li><?php echo $this->Html->link('gerenciadores', array('controller' => 'managers', 'action' => 'index')); ?>
                            </li>
                            <li><?php echo $this->Html->link('usuários', array('controller' => 'users', 'action' => 'index')); ?>
                            </li>

                       </ul>
                   <?php endif;?>
			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
		</div>
	</div>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>