<h2>New <span class='muted'>Product</span></h2>
<br>
<?php if (Auth::has_access("products.create")): ?>

<?php echo render('products/_form'); ?>

<?php endif; ?>



<p><?php echo Html::anchor('products', 'Back'); ?></p>
