<?php if (Auth::has_access("products.create")){ ?>

<h2>Jauns <span class='muted'>produkts</span></h2>
<br>

<?php echo render('products/_form'); ?>

<p><?php echo Html::anchor('products', 'Atpakaļ'); ?></p>

<?php }else{
        Response::redirect('/');
}