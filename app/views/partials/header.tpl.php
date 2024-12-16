<?php
// app/Views/partials/header.tpl.php
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dans les "Fournitures" - oShop</title>
    <link rel="stylesheet" href="/assets/css/styles.css">
</head>
<body>
    <header>
        <div class="topbar">
            <h1>Dans les "Fournitures"</h1>
            <p class="slogan">Tout pour la rentrée et plus encore</p>
        </div>
        <nav class="main-nav">
            <ul>
                <!-- On utilise ?controller=... & method=... -->
                <li><a href="?controller=main&method=home">Accueil</a></li>
                <li><a href="?controller=catalog&method=category">Catégories</a></li>
                <li><a href="?controller=catalog&method=type">Types de produits</a></li>
                <li><a href="?controller=catalog&method=brand">Marques</a></li>
            </ul>
        </nav>
    </header>
    <main>
