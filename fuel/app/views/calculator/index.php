<h2>Preču, pakalpojumu kalkulators</h2>
<?php foreach ($products as $item): ?>

    <p class="product" data-daily-price="<?php echo (floatval($item->price)); ?>">
       
        <label ><?php echo $item->name; ?>, Cena: <?php echo $item->price; ?></label>
        <input type="number" class="products" value="0">
    </p>
<?php endforeach; ?>
 <p>Kopā: <span id="total">0</span>&euro;</p>
 <input id="menu_id" value="1">