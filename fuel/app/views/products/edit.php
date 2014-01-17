
<?php if (Auth::has_access("product.edit")){ ?>

<h2>Editing <span class='muted'>Product</span></h2>
<br>
<?php echo render('products/_form'); ?>

<p>
    <?php echo Html::anchor('products/view/'.$product->id, 'View'); ?>
</p>

<p> <?php echo Html::anchor('products', 'Back'); ?></p>

<?php }else{
        Response::redirect('/');
  }  