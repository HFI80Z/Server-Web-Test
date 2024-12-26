<?php
// app/Views/category.tpl.php
?>
<h2>Nos catégories</h2>

<div class="category-grid">
    <?php foreach ($categories as $category): ?>
        <div class="category-card">

            <!-- Bouton qui renvoie vers la page "type" du CatalogController,
                 en passant l'ID de la catégorie -->
            <a href="?controller=catalog&method=type&id=<?= $category->getId() ?>">
                
                <!-- UNE SEULE image pour toutes les catégories : "categ5.jpeg" -->
                <img 
                    src="/assets/images/categories/categ5.jpeg" 
                    alt="<?= htmlspecialchars($category->getName()) ?>">
                
                <p><?= htmlspecialchars($category->getName()) ?></p>
            </a>
        </div>
    <?php endforeach; ?>
</div>
