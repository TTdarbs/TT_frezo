<?php if ($products): ?> <!-- attēli priekš bilžu rādītāja -->
<ul id="roundabout">	
<?php foreach ($products as $item): ?>		<tr>
<li><img src="/assets/img/products/<?php echo $item->image; ?>" alt="teksts"></li>			
<?php endforeach; ?>
</ul>
<?php else: ?>
<?php endif; ?>






<h2 id="cont_title">Jaunumi</h2>

<p id="news_add">
	<?php echo Html::anchor('news/create', 'Pievienot jaunu ziņu', array('class' => 'btn btn-success')); ?>

</p>

<?php if ($news): ?>
<div id="news">
<?php foreach ($news as $item): ?>		
            <div class="news_article" >
                    
                    
                    <div class="news_name"><h2><?php echo $item->name; ?></h2></div>
                    <p class="news_summary"><?php echo $item->summary; ?></p>
                    <img src="/assets/img/news/<?php echo $item->image; ?>" alt="teksts">
                    <div class="news_info">
                        <ul>
                            <li><b>Pievienoja: </b><?php echo $item->user->email; ?></li>
                            <li><b>Datums: </b> <?php echo $item->updated_at; ?></li>
                        </ul>
                    </div>
                    <div class="news_butt">
                        <ul>
                            <li><?php echo Html::anchor('news/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-small')); ?></li>
                            
                           
                            <li><?php echo Html::anchor('news/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-small btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?></li>					
                        
                        
                        </ul> 
                        
                    </div>
            </div>
<?php endforeach; ?>	
</div>

<?php else: ?>
<p>No News.</p>

<?php endif; ?>
