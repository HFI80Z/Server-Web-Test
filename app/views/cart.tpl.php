<?php
// app/Views/cart.tpl.php
?>
<section class="cart-page">
    <h1><span class="cart-icon">🛒</span> Mon Panier</h1>

    <?php 
    // Ici, on compte le nombre d'articles
    $itemCount = count($cartItems);
    ?>
    <p><?= $itemCount; ?> article<?= ($itemCount>1) ? 's' : ''; ?></p>

    <?php if ($itemCount === 0): ?>
        <p>Votre panier est vide.</p>
        <p><a href="?controller=catalog&method=category">Cliquez ici pour continuer vos achats.</a></p>
    <?php else: ?>
        <!-- Liste des produits du panier -->
        <ul>
            <?php foreach($cartItems as $item): ?>
                <li><?= htmlspecialchars($item->getName()); ?> - <?= htmlspecialchars($item->getPrice()); ?> €</li>
            <?php endforeach; ?>
        </ul>
        <p>Total : XX €</p>
        <button>Valider mon panier</button>
    <?php endif; ?>
</section>
