<h2>Viewing <span class='muted'>#<?php echo $comment->id; ?></span></h2>

<p>
	<strong>Message:</strong>
	<?php echo $comment->message; ?></p>
<p>
	<strong>Author id:</strong>
	<?php echo $comment->author_id; ?></p>
<p>
	<strong>News id:</strong>
	<?php echo $comment->news_id; ?></p>

<?php echo Html::anchor('comments/edit/'.$comment->id, __("EDIT")); ?> |
<?php echo Html::anchor('comments', __("BACK")); ?>