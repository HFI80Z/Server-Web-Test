<?php
// app/Views/type.tpl.php
?>
<h2>Liste des types de produits</h2>
<ul>
    <?php foreach($types as $type): ?>
        <li><?= htmlspecialchars($type->getName()); ?></li>
    <?php endforeach; ?>
</ul>
