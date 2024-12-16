<?php
// app/Views/category.tpl.php
?>
<h2>Liste des catégories</h2>
<ul>
    <?php foreach($categories as $category): ?>
        <li><?= htmlspecialchars($category->getName()); ?></li>
    <?php endforeach; ?>
</ul>
