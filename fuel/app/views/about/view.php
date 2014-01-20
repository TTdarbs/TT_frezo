<h2>Viewing <span class='muted'>#<?php echo $about->id; ?></span></h2>

<p>
	<strong>Title desc:</strong>
	<?php echo $about->title_desc; ?></p>
<p>
	<strong>Desc desc:</strong>
	<?php echo $about->desc_desc; ?></p>
<p>
	<strong>Title history:</strong>
	<?php echo $about->title_history; ?></p>
<p>
	<strong>Desc history:</strong>
	<?php echo $about->desc_history; ?></p>
<p>
	<strong>Title vision:</strong>
	<?php echo $about->title_vision; ?></p>
<p>
	<strong>Desc vision:</strong>
	<?php echo $about->desc_vision; ?></p>

<?php echo Html::anchor('about/edit/'.$about->id, 'Edit'); ?> |
<?php echo Html::anchor('about', 'Back'); ?>