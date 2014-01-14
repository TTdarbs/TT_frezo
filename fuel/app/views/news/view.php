<h2>Viewing <span class='muted'>#<?php echo $news->id; ?></span></h2>

<p>
	<strong>Name:</strong>
	<?php echo $news->name; ?></p>
<p>
	<strong>Summary:</strong>
	<?php echo $news->summary; ?></p>
<p>
	<strong>Message:</strong>
	<?php echo $news->message; ?></p>
<p>
	<strong>Author id:</strong>
	<?php echo $news->author_id; ?></p>

<?php echo Html::anchor('news/edit/'.$news->id, 'Edit'); ?> |
<?php echo Html::anchor('news', 'Back'); ?>