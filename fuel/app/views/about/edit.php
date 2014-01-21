<?php if (Auth::has_access("about.edit")){ ?>

<h2>Editing <span class='muted'>About</span></h2>
<br>

<?php echo render('about/_form'); ?>
<p>
	<?php echo Html::anchor('about/view/'.$about->id, __("VIEW")); ?> |
	<?php echo Html::anchor('about', __("BACK")); ?>
</p>


<?php }else{
        Response::redirect('/');
  }  


