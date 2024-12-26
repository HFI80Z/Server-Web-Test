<?php
// app/Views/cart.tpl.php
?>
<h1><i class="cart-icon">🛒</i> Mon Panier</h1>

<?php if (empty($cartItems)): ?>
    <p>Votre panier est vide.</p>
    <a href="?controller=type&method=list" class="continue-shopping-button">Cliquez ici pour continuer vos achats.</a>
<?php else: ?>
    <table class="cart-table">
        <thead>
            <tr>
                <th>Produit</th>
                <th>Prix unitaire</th>
                <th>Quantité</th>
                <th>Sous-total</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $total = 0; 
            foreach ($cartItems as $item): 
                $subtotal = $item['price'] * $item['quantity'];
                $total += $subtotal;
            ?>
                <tr>
                    <td><?= htmlspecialchars($item['name']); ?></td>
                    <td><?= number_format($item['price'], 2); ?> €</td>
                    <td><?= $item['quantity']; ?></td>
                    <td><?= number_format($subtotal, 2); ?> €</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3"><strong>Total :</strong></td>
                <td><strong><?= number_format($total, 2); ?> €</strong></td>
            </tr>
        </tfoot>
    </table>
    <a href="?controller=cart&method=clear" class="clear-cart-button">Vider le panier</a>
<?php endif; ?>
