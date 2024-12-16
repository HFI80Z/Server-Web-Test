<?php
// app/Views/brand.tpl.php
?>
<h2>Liste des marques</h2>
<ul>
    <?php foreach($brands as $brand): ?>
        <li><?= htmlspecialchars($brand->getName()); ?></li>
    <?php endforeach; ?>
</ul>
