<h2 id="cont_title"><?php echo $news->name; ?></h2>

<p>	<?php echo $news->message; ?></p>
<p>
	<strong>Autors:</strong>
	<?php echo $news->author_id; ?></p>

<?php $user = \Auth::get_user_id() ?>
<?php if (Auth::has_access("comment.create")): ?>

    <?php echo render('comments/_form'); ?>
<?php endif; ?>


<ul id="view_butt">
    <li><?php echo Html::anchor('news/edit/'.$news->id, 'Rediģēt'); ?></li> 
    <li><?php echo Html::anchor('news', 'Atpakaļ'); ?></li>
</ul>

<strong>Komentāri:</strong>

<?php   foreach ($news->comments as $comment): ?>
    <h4><?php echo $comment->user->email ?></h4>
    <p><?php echo $comment->message ?></p>
    <?php if ((Auth::has_access("comment.create") && $user[1] == $comment->user->id) or Auth::has_access("comment.allrights")) : ?>
	<?php echo Html::anchor('comment/edit/'.$comment->id, 'Edit'); ?> |
        <?php echo Html::anchor('comment/delete/'.$comment->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>
     <?php endif; ?>
<?php   endforeach ?>