<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
        
        <?php echo Asset::css('template.css'); ?>
        
        <?php echo Asset::js('jquery-2.0.3.js'); ?>
        <?php echo Asset::js('jquery.roundabout.js'); ?>
        <?php echo Asset::js('roundabout.js'); ?>
        <?php echo Asset::js('jquery.event.drag-2.2.js'); ?>
        <?php echo Asset::js('jquery.event.drop-2.2.js'); ?>
        <?php echo Asset::js('jquery.roundabout-shapes.js'); ?>
	
</head>
<body>
    <div class="main">
        <div class="header">
            <div class="logo">
                <h1><?php echo Html::anchor("news/index/", "Frezo.lv"); ?> <small>Iefrēzē savu Frezo</small></a></h1>
            </div>
            <div id="login">
                <?php
                    if (isset($user_info))
                    {
                        echo $user_info->group;
                    }
                    else
                    {
                        if (Auth::instance()->check())
                        {
                            $link = array('Logged in as: '.Auth::instance()->get_screen_name(), Html::anchor('login/logout', 'Logout'));
                            echo Html::ul($link);
                        }
                        else
                        {
                            echo render('login/index');
                        }
                    }
                    Request::forge('login/index')->execute();
                ?>
            </div>
            <div class="menu_nav">
                <ul>
                    <li><?php echo Html::anchor("news/", "Kalkulators"); ?></li>
                    <li class="active"><?php echo Html::anchor("news/", "Jaunumi"); ?></li>
                    <li><?php echo Html::anchor("products/", "Katalogs"); ?></li>
                    <li><?php echo Html::anchor("about/", "Par mums"); ?></li>
                    <li><?php echo Html::anchor("news/index/", "Kontakti"); ?></li>
                </ul>
            </div>
        </div>
        
        
        
        
        <div class="container">
		<div class="col-md-12">
			
<?php if (Session::get_flash('success')): ?>
			<div class="alert alert-success">
				<strong>Success</strong>
				<p>
				<?php echo implode('</p><p>', e((array) Session::get_flash('success'))); ?>
				</p>
			</div>
<?php endif; ?>
<?php if (Session::get_flash('error')): ?>
			<div class="alert alert-error">
				<strong>Error</strong>
				<p>
				<?php echo implode('</p><p>', e((array) Session::get_flash('error'))); ?>
				</p>
			</div>
<?php endif; ?>
		</div>
		<div class="col-md-12">
<?php echo $content; ?>
		</div>
		<footer>
			<p class="pull-right">Page rendered in {exec_time}s using {mem_usage}mb of memory.</p>
			<p>
				<a href="http://fuelphp.com">FuelPHP</a> is released under the MIT license.<br>
				<small>Version: <?php echo e(Fuel::VERSION); ?></small>
			</p>
		</footer>
	</div>
        
        
        
    </div>
    
</body>
</html>
