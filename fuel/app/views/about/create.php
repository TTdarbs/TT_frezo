<?php if (Auth::has_access("about.create")){ ?>

<h2>Izveidot <span class='muted'>Par mums</span></h2>
<br>

<?php echo render('about/_form'); ?>


<p><?php echo Html::anchor('about', __("BACK")); ?></p>


<?php }else{
        Response::redirect('/');
  }  



