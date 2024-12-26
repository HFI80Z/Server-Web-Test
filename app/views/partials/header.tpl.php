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

<header class="site-header">
    <!-- Barre supérieure (logo, recherche, compte, panier) -->
    <div class="header-top">
        <!-- Logo -->
        <div class="logo">
            <!-- Remplacez l'URL de l'image selon vos besoins -->
            <img src="/assets/images/logo2.jpeg" alt="Logo BIC">
        </div>

        <!-- Liens compte & panier -->
        <div class="header-actions">
            <!-- Renvoie vers UserController::login() -->
            <a href="?controller=user&method=login">Mon compte</a>
            <!-- Renvoie vers CartController::showCart() -->
            <a href="?controller=cart&method=showCart">Mon Panier</a>
        </div>
    </div>

    <!-- Barre de navigation principale -->
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
