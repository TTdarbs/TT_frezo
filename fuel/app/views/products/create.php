<?php if (Auth::has_access("products.create")){ ?>

<h2>New <span class='muted'>Product</span></h2>
<br>

<?php echo render('products/_form'); ?>

<p><?php echo Html::anchor('products', 'Back'); ?></p>

<?php }else{
        Response::redirect('/');
  }  
