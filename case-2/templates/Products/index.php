<h1>Product Overview</h1>

<?php /* ?>
<table>
<thead>
<tr>
<th>ID</th>
<th>Name</th>
<th>Price</th>
</tr>
</thead>
<tbody>
<?php foreach ($products as $product): ?>
<tr>
<td><?= h($product->product_id) ?></td>
<td><?= h($product->name) ?></td>
<td>€ <?= number_format($product->price, 2, ',', '.') ?></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
<?php /**/ ?>



<?php

// Cell test
echo $this->cell('ProductAmount');

?>


<div class="product-card-grid">
    <?php
    // Element test
    foreach ($products as $product):
        echo $this->element('product-card', [
            'product' => $product,
        ]);
    endforeach;
    ?>
</div>