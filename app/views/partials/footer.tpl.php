<?php
// app/Views/partials/footer.tpl.php
?>
    </main>

    <footer>
        <div class="footer-content">
            <p>&copy; <?= date('Y'); ?> - Dans les "Fournitures"</p>
            <p>Livraison et retours gratuits - 30 jours pour renvoyer - Service client : 01 02 03 04 05 (8h-19h, lun-ven)</p>
            <form action="" method="post" class="newsletter-form">
                <label for="newsletter-email">Inscrivez-vous à notre newsletter :</label>
                <input type="email" id="newsletter-email" name="newsletter-email" placeholder="Votre email...">
                <button type="submit">S'inscrire</button>
            </form>
            <div class="social-links">
                <a href="#">Facebook</a> | <a href="#">Twitter</a> | <a href="#">Instagram</a>
            </div>
        </div>
    </footer>
</body>
</html>
