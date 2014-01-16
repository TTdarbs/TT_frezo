<h2>Editing <span class='muted'>News</span></h2>
<br>

<?php if (Auth::has_access("news.edit")): ?>

<?php echo render('news/_form'); ?>

<p>
	<?php echo Html::anchor('news/view/'.$news->id, 'View'); ?>
</p>
	

<?php endif; ?>


<p> <?php echo Html::anchor('news', 'Back'); ?></p>




















