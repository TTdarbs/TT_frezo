<ul class="nav nav-pills">
	<li class='<?php echo Arr::get($subnav, "login" ); ?>'><?php echo Html::anchor('login/login','Login');?></li>
	<li class='<?php echo Arr::get($subnav, "logut" ); ?>'><?php echo Html::anchor('login/logut','Logut');?></li>
	<li class='<?php echo Arr::get($subnav, "registration" ); ?>'><?php echo Html::anchor('login/registration','Registration');?></li>
	<li class='<?php echo Arr::get($subnav, "lostpassword" ); ?>'><?php echo Html::anchor('login/lostpassword','Lostpassword');?></li>

</ul>
<p>Lostpassword</p>