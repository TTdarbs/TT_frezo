<?php if (Auth::has_access("news.create")){ ?>

<h2>Pievienot <span class='muted'>jaunumu</span></h2>
<br>

<?php echo render('news/_form'); ?>

<p><?php echo Html::anchor('news', 'Back'); ?></p>

<?php }else{
        Response::redirect('/');
  }  