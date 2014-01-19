<?php if ($products): ?>
<ul id="roundabout">	
<?php foreach ($products as $item): ?>		<tr>
<li><img src="/assets/img/products/<?php echo $item->image; ?>" alt="teksts"></li>
			
<?php endforeach; ?>
</ul>
<?php else: ?>

<?php endif; ?><p>






<h2>Jaunumi</h2>
<br>
<?php if ($news): ?>
<table class="table table-striped">
	<thead>
		<tr>
                        <th></th>
			<th></th>
			<th></th>
			<th></th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody id="news">
<?php foreach ($news as $item): ?>		<tr>
                        <td class="news_img"><img src="/assets/img/news/<?php echo $item->image; ?>" alt="teksts"></td>
			<td class="news_name"><?php echo $item->name; ?></td>
			<td class="news_summary"><?php echo $item->summary; ?></td>
			<td><?php echo $item->user->email; ?></td>
                        
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('news/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-small')); ?>						
                                                    <?php echo Html::anchor('news/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-small')); ?>						
                                                        <?php echo Html::anchor('news/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', 
                                                                array('class' => 'btn btn-small btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					
                                        </div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>
<a href="/products/">asdasas</a>
<?php else: ?>
<p>No News.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('news/create', 'Add new News', array('class' => 'btn btn-success')); ?>

</p>
