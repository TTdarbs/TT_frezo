<h2 id="cont_title"><?php echo $news->name; ?></h2>

<p>	<?php echo $news->message; ?></p>
<p>
	<strong>Autors:</strong>
	<?php echo $news->user->email; ?></p>
<ul id="view_butt">
    <li><?php echo Html::anchor('news/edit/'.$news->id, __("EDIT")); ?></li> 
    <li><?php echo Html::anchor('news', __("BACK")); ?></li>
</ul>


<?php 
    
    $user = \Auth::get_user_id();
        ?>
<?php if (Auth::has_access("comment.create")): ?>
    
    <h3><?php echo Html::anchor('comments/create/'.$news->id, __("ADD_COMMENT")); ?></h3>
<?php endif; ?>




<strong>Komentāri:</strong>

<?php   foreach ($news->comments as $comment): ?>
    <h4><?php echo $comment->user->email ?></h4>
    <p><?php echo $comment->message ?></p>
    <?php if ((Auth::has_access("comment.create") && $user[1] == $comment->user->id) or Auth::has_access("comment.allrights")) : ?>
	<?php echo Html::anchor('comments/edit/'.$comment->id, __("EDIT")); ?> |
        <?php echo Html::anchor('comments/delete/'.$comment->id, __("DELETE"), array('onclick' => "return confirm('Are you sure?')")); ?>
     <?php endif; ?>
<?php   endforeach ?>