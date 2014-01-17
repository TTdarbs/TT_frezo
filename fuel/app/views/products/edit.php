
<?php if (Auth::has_access("product.edit")){ ?>

<h2>Rediģēt <span class='muted'>produktu</span></h2>
<br>
<?php echo render('products/_form'); ?>

<p>
    <?php echo Html::anchor('products/view/'.$product->id, 'View'); ?>
</p>

<p> <?php echo Html::anchor('products', 'Atpakaļ'); ?></p>

<?php }else{
        Response::redirect('/');
  }  