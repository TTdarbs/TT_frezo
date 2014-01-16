<h2>Editing <span class='muted'>Product</span></h2>
<br>

<?php if (Auth::has_access("product.edit")): ?>

<?php echo render('products/_form'); ?>

<p>
	<?php echo Html::anchor('products/view/'.$product->id, 'View'); ?>
	</p>


<?php endif; ?>

<p> <?php echo Html::anchor('products', 'Back'); ?></p>