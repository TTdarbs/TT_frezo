
<?php if (Auth::has_access("product.edit")){ ?>

<h2>Rediģēt <span class='muted'>produktu</span></h2>
<br>
<?php echo render('products/_form'); ?>

<p>
    <?php echo Html::anchor('products/view/'.$product->id, __("VIEW")); ?>
</p>

<p> <?php echo Html::anchor('products', __("BACK")); ?></p>

<?php }else{
        Response::redirect('/');
  }  