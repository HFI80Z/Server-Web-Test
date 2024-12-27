<?php
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dans les "Fournitures" - oShop</title>
    <link rel="stylesheet" href="/assets/css/styles.css">
</head>
<body>

<header class="site-header">
    <div class="header-top">
        <div class="logo">
            <img src="/assets/images/logo2.jpeg" alt="Logo BIC">
        </div>

        <div class="header-actions">
            <a href="?controller=user&method=login">Mon compte</a>
            <a href="?controller=cart&method=showCart">Mon Panier</a>
        </div>
    </div>

    <nav class="main-nav">
        <ul>
            <li><a href="?controller=main&method=home">Accueil</a></li>
            <li><a href="?controller=catalog&method=category">Catégories</a></li>
            <li><a href="?controller=catalog&method=type">Produits</a></li>
            <li><a href="?controller=catalog&method=brand">Marques</a></li>
        </ul>
    </nav>
</header>

<main>
