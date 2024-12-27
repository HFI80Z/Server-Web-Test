<?php
namespace App\Controllers;

abstract class CoreController
{

    protected function show(string $viewName, array $viewData = [])
    {
        extract($viewData);

        require __DIR__ . '/../views/partials/header.tpl.php';

        require __DIR__ . '/../views/' . $viewName . '.tpl.php';

        require __DIR__ . '/../views/partials/footer.tpl.php';
    }
}
