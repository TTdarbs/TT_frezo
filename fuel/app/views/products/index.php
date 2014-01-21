<h2>Listing <span class='muted'>Products</span></h2>
<br>
<?php if ($products): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Summary</th>
			<th>Price</th>
			
			<th>Author id</th>
                        <th>Image</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
        <tbody id="prod">
<?php foreach ($products as $item): ?>		<tr>

			<td><?php echo $item->name; ?></td>
                        
			<td><?php echo $item->summary; ?></td>
			<td><?php echo $item->price; ?></td>
                        <td><?php echo $item->author_id; ?></td>
                        <td><img id="prod_img" src="/assets/img/products/<?php echo $item->image; ?>" alt="teksts"></td>
			
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('products/view/'.$item->id, __("VIEW"), array('class' => 'btn btn-small')); ?><br>						
                                                        <?php echo Html::anchor('products/delete/'.$item->id, __("DELETE"), array('class' => 'btn btn-small btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Products.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('products/create', 'Add new Product', array('class' => 'btn btn-success')); ?>

</p>
