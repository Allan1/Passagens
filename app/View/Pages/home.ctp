<?php
    echo $this->Html->script('jquery-ui');    
    echo $this->Html->css('jquery-ui');
?>
<script>
    $(function() {
        var availableTags = [
            <?php echo $sugestion_name; ?>
        ];
        $( "#CityOrigin" ).autocomplete({
                source: availableTags
        });
        $( "#CityDestination" ).autocomplete({
                source: availableTags
        });
    });
    $(function() {
        $( "#CityFrom" ).datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 2,
            onClose: function( selectedDate ) {
                $( "#to" ).datepicker( "option", "minDate", selectedDate );
            }
        });
        $( "#CityTo" ).datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 2,
            onClose: function( selectedDate ) {
                $( "#from" ).datepicker( "option", "maxDate", selectedDate );
            }
        });
        $( "#CityFrom" ).datepicker( "option", "dateFormat", "dd/mm/yy" );
        $( "#CityTo" ).datepicker( "option", "dateFormat", "dd/mm/yy" );
    });
    
    $(document).ready(function(){
        if(!$("#CityPassages").is(':checked')){
                $('#CityOrigin').parent('div').css('display','none');
                $('#CityFrom').parent('div').css('display','none');
                $('#CityTo').parent('div').css('display','none');
            }
            else{
                $('#CityOrigin').parent('div').css('display','block');
                $('#CityFrom').parent('div').css('display','block');
                $('#CityTo').parent('div').css('display','block');
            }
        $("#CityPassages").click(function(){
            if(!$(this).is(':checked')){
                $('#CityOrigin').parent('div').css('display','none');
                $('#CityFrom').parent('div').css('display','none');
                $('#CityTo').parent('div').css('display','none');
            }
            else{
                $('#CityOrigin').parent('div').css('display','block');
                $('#CityFrom').parent('div').css('display','block');
                $('#CityTo').parent('div').css('display','block');
            }
        });
    });
</script>
<style>
    body{
/*        background-image: url('http://localhost/projeto/app/webroot/img/bg.jpg');
        background-repeat: no-repeat;
        background-size: 100% 100%;*/
    }
    #content{
/*        background: transparent;*/
    }
</style>
<?php
if (Configure::read('debug') == 0):
	throw new NotFoundException();
endif;
App::uses('Debugger', 'Utility');
?>
<div id="home">
    <?php 
        echo $this->Form->create('City',array('action'=>'view'));
        echo $this->Form->input('destination',array('label'=>'Qual o seu destino?'));
        echo $this->Form->input('passages',array('label'=>'Passagens','type'=>'checkbox'));
        echo $this->Form->input('origin',array('label'=>'Onde você está?'));
        echo $this->Form->input('from',array('label'=>'Partida'));
        echo $this->Form->input('to',array('label'=>'Retorno'));
        echo $this->Form->input('hotels',array('label'=>'Hotéis','type'=>'checkbox','checked'=>'checked'));
        echo $this->Form->input('climate',array('label'=>'Clima','type'=>'checkbox','checked'=>'checked'));
        echo $this->Form->input('news',array('label'=>'Notícias','type'=>'checkbox','checked'=>'checked'));
        echo $this->Form->end('Buscar');
    ?>
</div>
<!--
<?php
//if (Configure::read('debug') > 0):
//	Debugger::checkSecurityKeys();
//endif;
?>
<!--<p id="url-rewriting-warning" style="background-color:#e32; color:#fff;">
	<?php echo __d('cake_dev', 'URL rewriting is not properly configured on your server.'); ?>
	1) <a target="_blank" href="http://book.cakephp.org/2.0/en/installation/advanced-installation.html#apache-and-mod-rewrite-and-htaccess" style="color:#fff;">Help me configure it</a>
	2) <a target="_blank" href="http://book.cakephp.org/2.0/en/development/configuration.html#cakephp-core-configuration" style="color:#fff;">I don't / can't use URL rewriting</a>
</p>
<p>
<?php
	if (version_compare(PHP_VERSION, '5.2.8', '>=')):
		echo '<span class="notice success">';
			echo __d('cake_dev', 'Your version of PHP is 5.2.8 or higher.');
		echo '</span>';
	else:
		echo '<span class="notice">';
			echo __d('cake_dev', 'Your version of PHP is too low. You need PHP 5.2.8 or higher to use CakePHP.');
		echo '</span>';
	endif;
?>
</p>
<p>
	<?php
		if (is_writable(TMP)):
			echo '<span class="notice success">';
				echo __d('cake_dev', 'Your tmp directory is writable.');
			echo '</span>';
		else:
			echo '<span class="notice">';
				echo __d('cake_dev', 'Your tmp directory is NOT writable.');
			echo '</span>';
		endif;
	?>
</p>
<p>
	<?php
		$settings = Cache::settings();
		if (!empty($settings)):
			echo '<span class="notice success">';
				echo __d('cake_dev', 'The %s is being used for core caching. To change the config edit APP/Config/core.php ', '<em>'. $settings['engine'] . 'Engine</em>');
			echo '</span>';
		else:
			echo '<span class="notice">';
				echo __d('cake_dev', 'Your cache is NOT working. Please check the settings in APP/Config/core.php');
			echo '</span>';
		endif;
	?>
</p>
<p>
	<?php
		$filePresent = null;
		if (file_exists(APP . 'Config' . DS . 'database.php')):
			echo '<span class="notice success">';
				echo __d('cake_dev', 'Your database configuration file is present.');
				$filePresent = true;
			echo '</span>';
		else:
			echo '<span class="notice">';
				echo __d('cake_dev', 'Your database configuration file is NOT present.');
				echo '<br/>';
				echo __d('cake_dev', 'Rename APP/Config/database.php.default to APP/Config/database.php');
			echo '</span>';
		endif;
	?>
</p>
<?php
if (isset($filePresent)):
	App::uses('ConnectionManager', 'Model');
	try {
		$connected = ConnectionManager::getDataSource('default');
	} catch (Exception $connectionError) {
		$connected = false;
	}
?>
<p>
	<?php
		if ($connected && $connected->isConnected()):
			echo '<span class="notice success">';
	 			echo __d('cake_dev', 'Cake is able to connect to the database.');
			echo '</span>';
		else:
			echo '<span class="notice">';
				echo __d('cake_dev', 'Cake is NOT able to connect to the database.');
				echo '<br /><br />';
				echo $connectionError->getMessage();
			echo '</span>';
		endif;
	?>
</p>
<?php endif;?>
<?php
	App::uses('Validation', 'Utility');
	if (!Validation::alphaNumeric('cakephp')) {
		echo '<p><span class="notice">';
			echo __d('cake_dev', 'PCRE has not been compiled with Unicode support.');
			echo '<br/>';
			echo __d('cake_dev', 'Recompile PCRE with Unicode support by adding <code>--enable-unicode-properties</code> when configuring');
		echo '</span></p>';
	}
?>
<h3><?php echo __d('cake_dev', 'Editing this Page'); ?></h3>
<p>
<?php
echo __d('cake_dev', 'To change the content of this page, edit: APP/View/Pages/home.ctp.<br />
To change its layout, edit: APP/View/Layouts/default.ctp.<br />
You can also add some CSS styles for your pages at: APP/webroot/css.');
?>
</p>

<h3><?php echo __d('cake_dev', 'Getting Started'); ?></h3>
<p>
	<?php
		echo $this->Html->link(
			sprintf('<strong>%s</strong> %s', __d('cake_dev', 'New'), __d('cake_dev', 'CakePHP 2.0 Docs')),
			'http://book.cakephp.org/2.0/en/',
			array('target' => '_blank', 'escape' => false)
		);
	?>
</p>
<p>
	<?php
		echo $this->Html->link(
			__d('cake_dev', 'The 15 min Blog Tutorial'),
			'http://book.cakephp.org/2.0/en/tutorials-and-examples/blog/blog.html',
			array('target' => '_blank', 'escape' => false)
		);
	?>
</p>

<h3><?php echo __d('cake_dev', 'More about Cake'); ?></h3>
<p>
<?php echo __d('cake_dev', 'CakePHP is a rapid development framework for PHP which uses commonly known design patterns like Active Record, Association Data Mapping, Front Controller and MVC.'); ?>
</p>
<p>
<?php echo __d('cake_dev', 'Our primary goal is to provide a structured framework that enables PHP users at all levels to rapidly develop robust web applications, without any loss to flexibility.'); ?>
</p>

<ul>
	<li><a href="http://cakefoundation.org/"><?php echo __d('cake_dev', 'Cake Software Foundation'); ?> </a>
	<ul><li><?php echo __d('cake_dev', 'Promoting development related to CakePHP'); ?></li></ul></li>
	<li><a href="http://www.cakephp.org"><?php echo __d('cake_dev', 'CakePHP'); ?> </a>
	<ul><li><?php echo __d('cake_dev', 'The Rapid Development Framework'); ?></li></ul></li>
	<li><a href="http://book.cakephp.org"><?php echo __d('cake_dev', 'CakePHP Documentation'); ?> </a>
	<ul><li><?php echo __d('cake_dev', 'Your Rapid Development Cookbook'); ?></li></ul></li>
	<li><a href="http://api20.cakephp.org"><?php echo __d('cake_dev', 'CakePHP API'); ?> </a>
	<ul><li><?php echo __d('cake_dev', 'Quick Reference'); ?></li></ul></li>
	<li><a href="http://bakery.cakephp.org"><?php echo __d('cake_dev', 'The Bakery'); ?> </a>
	<ul><li><?php echo __d('cake_dev', 'Everything CakePHP'); ?></li></ul></li>
	<li><a href="http://live.cakephp.org"><?php echo __d('cake_dev', 'The Show'); ?> </a>
	<ul><li><?php echo __d('cake_dev', 'The Show is a live and archived internet radio broadcast CakePHP-related topics and answer questions live via IRC, Skype, and telephone.'); ?></li></ul></li>
	<li><a href="http://groups.google.com/group/cake-php"><?php echo __d('cake_dev', 'CakePHP Google Group'); ?> </a>
	<ul><li><?php echo __d('cake_dev', 'Community mailing list'); ?></li></ul></li>
	<li><a href="irc://irc.freenode.net/cakephp">irc.freenode.net #cakephp</a>
	<ul><li><?php echo __d('cake_dev', 'Live chat about CakePHP'); ?></li></ul></li>
	<li><a href="http://github.com/cakephp/"><?php echo __d('cake_dev', 'CakePHP Code'); ?> </a>
	<ul><li><?php echo __d('cake_dev', 'For the Development of CakePHP Git repository, Downloads'); ?></li></ul></li>
	<li><a href="http://cakephp.lighthouseapp.com/"><?php echo __d('cake_dev', 'CakePHP Lighthouse'); ?> </a>
	<ul><li><?php echo __d('cake_dev', 'CakePHP Tickets, Wiki pages, Roadmap'); ?></li></ul></li>
</ul>-->
