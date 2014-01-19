<?php if (Auth::has_access("news.create")){ ?>

<h2 id="cont_title">Pievienot <span class='muted'>jaunumu</span></h2>
<br>

<?php echo render('news/_form'); ?>

<p id="back"><?php echo Html::anchor('news', 'Atpakaļ'); ?></p>

<?php }else{
        Response::redirect('/');
  }  