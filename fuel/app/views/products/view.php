<h2>Viewing <span class='muted'>#<?php echo $product->id; ?></span></h2>

<p>
	<strong>Name:</strong>
	<?php echo $product->name; ?></p>
<p>
	<strong>Summary:</strong>
	<?php echo $product->summary; ?></p>
<p>
	<strong>Price:</strong>
	<?php echo $product->price; ?></p>
<p>
	<strong>Image:</strong>
	<?php echo $product->image; ?></p>
<p>
	<strong>Author id:</strong>
	<?php echo $product->author_id; ?></p>

<?php echo Html::anchor('products/edit/'.$product->id, 'Edit'); ?> |
<?php echo Html::anchor('products', 'Back'); ?>