<?php if (Auth::has_access("news.edit")){ ?>

<h2>Rediģēt <span class='muted'>jaunumus</span></h2>
<br>

<?php echo render('news/_form'); ?>

<p>
	<?php echo Html::anchor('news/view/'.$news->id, 'View'); ?>
</p>
	
<p> <?php echo Html::anchor('news', 'Atpakaļ'); ?></p>

<?php }else{
        Response::redirect('/');
  }


















