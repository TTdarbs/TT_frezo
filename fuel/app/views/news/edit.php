<?php if (Auth::has_access("news.edit")){ ?>

<h2>Editing <span class='muted'>News</span></h2>
<br>

<?php echo render('news/_form'); ?>

<p>
	<?php echo Html::anchor('news/view/'.$news->id, 'View'); ?>
</p>
	
<p> <?php echo Html::anchor('news', 'Back'); ?></p>

<?php }else{
        Response::redirect('/');
  }


















