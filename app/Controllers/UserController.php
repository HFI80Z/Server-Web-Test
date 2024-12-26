<?php
namespace App\Controllers;

class UserController extends CoreController
{
    public function login()
    {
        // Dans une vraie app, on gérerait un formulaire de connexion
        // Ici, on se contente d'afficher la vue
        $this->show('login');
    }
}
