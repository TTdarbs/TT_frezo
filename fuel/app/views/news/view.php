<h2 id="cont_title"><?php echo $news->name; ?></h2>

<div id="news_view">
    <img id="news_view_img" src="/assets/img/news/<?php echo $news->image; ?>">
    <p>	<?php echo $news->message; ?></p>
    <p>
            <strong>Autors:</strong>
            <?php echo $news->user->email; ?></p>
</div>

<ul id="view_butt">
    <?php if(Auth::has_access("comment.allrights")):?>
        <li><?php echo Html::anchor('news/edit/'.$news->id, 'Rediģēt'); ?></li> 
    <?php endif; ?>
    <li><?php echo Html::anchor('news', 'Atpakaļ'); ?></li>
</ul>


<?php 
    
    $user = \Auth::get_user_id();
        ?>
<?php if (Auth::has_access("news.create")): ?>
    
    <h3><?php echo Html::anchor('comments/create/'.$news->id,'Pievienot komentāru!'); ?></h3>
<?php endif; ?>




<strong>Komentāri:</strong>

<?php   foreach ($news->comments as $comment): ?>
    <h4><?php echo $comment->user->email ?></h4>
    <p><?php echo $comment->message ?></p>
    <?php if ((Auth::has_access("comment.create") && $user[1] == $comment->user->id) or Auth::has_access("comment.allrights")) : ?>
	<?php echo Html::anchor('comments/edit/'.$comment->id, 'Edit'); ?> |
        <?php echo Html::anchor('comments/delete/'.$comment->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>
     <?php endif; ?>
<?php   endforeach ?>
<input id="menu_id" value="2">