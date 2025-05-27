<div class="product-card">
    <h2>#<?= h($product->product_id) ?> - <?= h($product->name); ?></h2>
    <div class="price">€ <?= number_format($product->price, 2, ',', '.') ?></div>
</div>