<?php
// app/Views/login.tpl.php
?>
<h1><span class="user-icon">👤</span> Je m'identifie</h1>

<form action="#" method="POST" class="login-form">
    <label for="email">Email</label>
    <input type="email" name="email" id="email" placeholder="exemple@mail.com">

    <label for="password">Mot de passe</label>
    <input type="password" name="password" id="password">

    <p class="forgot-password">
        <a href="#">Mot de passe oublié ?</a>
    </p>

    <button type="submit" class="login-button">Je me connecte</button>
</form>
