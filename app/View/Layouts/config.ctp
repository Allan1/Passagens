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
<!--

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
            <?php
//            ECHO $this->Html->meta( 'favicon.ico', '/projeto/app/webroot/favicon.ico', array('type' => 'icon')); 
//            echo $this->Html->script('jquery-1.8.0.min');
//            echo $this->Html->script('jquery-treeview/lib/jquery.cookie');
//            echo $this->Html->css('cake.generic');;
//            echo $this->fetch('meta');
//            echo $this->fetch('css');
//            echo $this->fetch('jquery-1.8.0.min');
            ?>
    <style>
            .show_hide li center{
                    background-image: url('../img/seta.png'); 
                    background-repeat: no-repeat;
                    background-position: right top; 
                    background-size: 10px 10px;
            }
    </style>
    </head>
    <body>
        <div id="container">
            <div id="content" >
                <div class='actions' style='width:20%;float:left;margin-right: 2%;padding: 0px;padding-left: 1% '>
                    <center><h3>Configurações</h3></center>
                    <div style="padding-right: 5px; font-size: 90%;">
                        <ul id="help" class="show_hide">
                            <li id="geral">
                                <center>Geral</center>
                                <hr></hr>
                                <ul>
                                    <li><?php //echo $this->Html->link('alterar dados', array('controller' => 'users', 'action' => 'edit')); ?></li>
                                </ul>
                            </li>
                            <li id="classificacao">
                                <center>Classificações</center>
                                <hr></hr>
                                <ul>
                                    <li><?php //echo $this->Html->link('reclassificar', array('controller' => 'classifications', 'action' => 'move')); ?></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>

                <div style='width:76%;float:left'>
                        <center ><?php //echo $this->Session->flash(); ?></center>
                        <?php //echo $this->fetch('content'); ?>
                </div>
            </div>
            <?php //echo $this->Html->script('lib'); ?>
            <div id="footer">
                    <?php
//				echo $this->Html->link(
//								$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')), 'http://www.cakephp.org/', array('target' => '_blank', 'escape' => false)
//				);
                    ?>
            </div>
        </div>
             ?php echo $this->element('sql_dump'); ? 
        <script>	
        $(document).ready(function(){
            $("ul.show_hide li ul").hide();

            $("ul.show_hide li center").click(function () {

                    if($(this).parent("li").children("ul").is(":visible"))
                            $(this).css("background-image"," url('../img/seta.png')");
                    else
                            $(this).css("background-image"," url('../img/seta_1.png')");
                    $(this).parent("li").siblings().children("center").css("background-image", "url('../img/seta.png')")
                    $(this).parent("li").children("ul").slideToggle("slow");
                    $(this).parent("li").siblings().children("ul").slideUp("slow");
                    $.cookie('li', $(this).parent("li").attr("id"), { path: '/'});
            });

            $("ul.show_hide li ul li").click(function(){
                    $.cookie('a', ($(this).prevAll().length + 1), { path: '/projeto/config'});
            });

            var lastLi = $.cookie('li');
            var lastA = $.cookie('a');
            if((lastLi)&&(lastA)){
                    $('#' + lastLi + ' center').click();
                    $('#' + lastLi + ' li:nth-child('+ lastA +')').css("background-color", "#CBE8A7");
            }
        });
        </script>
    </body>
</html>-->
