<h2>Pievienot <span class='muted'>jaunumu</span></h2>
<br>

<?php if (Auth::has_access("news.create")): ?>

<?php echo render('news/_form'); ?>

<?php endif; ?>



<p><?php echo Html::anchor('news', 'Back'); ?></p>
