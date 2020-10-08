<?php

namespace App\Views;

//use App\App;
//use Core\Router;
use Core\View;

class Footer extends View
{

    public function render(string $template_path = ROOT . '/app/templates/partials/footer.tpl.php')
    {
        return parent::render($template_path);
    }
}