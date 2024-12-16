<?php
// app/Views/product.tpl.php
?>
<h2>Liste des produits</h2>
<div class="product-list">
    <?php foreach($products as $product): ?>
        <div class="product-item">
            <h3><?= htmlspecialchars($product->getName()); ?></h3>
            <p><?= htmlspecialchars($product->getDescription()); ?></p>
            <p>Prix : <?= htmlspecialchars($product->getPrice()); ?> €</p>
        </div>
    <?php endforeach; ?>
</div>
