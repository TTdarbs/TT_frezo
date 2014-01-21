<?php if ($products): ?> <!-- attēli priekš bilžu rādītāja -->
<ul id="roundabout">	
<?php foreach ($products as $item): ?>		<tr>
<li><a href="/products/view/<?php echo $item->id ?>" >
    <img src="/assets/img/products/<?php echo $item->image; ?>" alt="Produkti"></a>
    <br />
    <span class="product-list">
        <?php echo $item->name; ?>, <?php echo $item->price; ?> &euro;
    </span>
</li>
<?php endforeach; ?>
</ul>
<?php else: ?>
<?php endif; ?>






<h2 id="cont_title">Jaunumi</h2>

<?php if (Auth::has_access("news.create")){ ?>

<p id="news_add">
    <?php echo Html::anchor('news/create', __("ADD_NEW MESSAGE"), array('class' => 'btn btn-success')); ?>  
</p>

<?php } ?>


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
                            <li><b>Datums: </b> <?php echo Date::forge($item->created_at)->format("%m/%d/%Y %H:%M", true); ?></li>
                        </ul>
                    </div>
                    <div class="news_butt">
                        <ul>
                            <li><?php echo Html::anchor('news/view/'.$item->id, __("VIEW"), array('class' => 'btn btn-small')); ?></li>
                            
                            <?php if (Auth::has_access("news.delete")){ ?>
                            <li><?php echo Html::anchor('news/delete/'.$item->id, __("DELETE"), array('class' => 'btn btn-small btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?></li>					
                            <?php } ?>
                        
                        </ul> 
                        
                    </div>
            </div>
<?php endforeach; ?>	
</div>

<?php else: ?>
<p>No News.</p>

<?php endif; ?>
