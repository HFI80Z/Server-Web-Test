<?php
// app/Views/home.tpl.php
?>
<section class="home-banner">
    <h2>Bienvenue sur notre boutique de fournitures scolaires</h2>
</section>

<section class="highlighted-categories">
    <h3>Nos catégories mises en avant :</h3>
    <ul>
        <?php foreach($categories as $category): ?>
            <li><?= htmlspecialchars($category); ?></li>
        <?php endforeach; ?>
    </ul>
</section>
