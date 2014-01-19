<h2 id="cont_title"><?php echo $news->name; ?></h2>

<p>	<?php echo $news->message; ?></p>
<p>
	<strong>Autors:</strong>
	<?php echo $news->author_id; ?></p>
<ul id="view_butt">
    <li><?php echo Html::anchor('news/edit/'.$news->id, 'Rediģēt'); ?></li> 
    <li><?php echo Html::anchor('news', 'Atpakaļ'); ?></li>
</ul>