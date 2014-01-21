<h2>Listing <span class='muted'>Abouts</span></h2>
<br>
<?php if ($abouts): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Title desc</th>
			<th>Desc desc</th>
			<th>Title history</th>
			<th>Desc history</th>
			<th>Title vision</th>
			<th>Desc vision</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($abouts as $item): ?>		<tr>

			<td><?php echo $item->title_desc; ?></td>
			<td><?php echo $item->desc_desc; ?></td>
			<td><?php echo $item->title_history; ?></td>
			<td><?php echo $item->desc_history; ?></td>
			<td><?php echo $item->title_vision; ?></td>
			<td><?php echo $item->desc_vision; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('about/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-small')); ?>
                                            <?php if(Auth::has_access("about.create")):?>
                                                <?php echo Html::anchor('about/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-small')); ?>						
                                                <?php echo Html::anchor('about/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-small btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
                                            <?php endif; ?>       
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Abouts.</p>

<?php endif; ?><p>
    <?php if(Auth::has_access("about.create")):?>
	<?php echo Html::anchor('about/create', 'Add new About', array('class' => 'btn btn-success')); ?>
    <?php endif; ?> 
</p>
<input id="menu_id" value="4">