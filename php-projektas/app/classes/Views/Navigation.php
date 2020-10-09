<?php

namespace App\Views;

use App\App;
use Core\Router;
use Core\View;

class Navigation extends View
{

    public function __construct()
    {
        $nav = [
            'home' => [
                'url' => Router::getUrl('index'),
                'class' => 'left',
                'title' => 'Titulinis',
            ],
        ];
        $nav[] = [
            'url' => Router::getUrl('feedback'),
            'class' => 'left' . ( Router::getUrl('feedback') == $_SERVER['REQUEST_URI'] ? ' active' : ''),
            'title' => 'Atsiliepimai',
        ];
        if (App::$session->getUser()) {
            $nav[] = [
                'url' => Router::getUrl('logout'),
                'class' => 'left',
                'title' => 'Atsijungti',
            ];

        } else {
            $nav[] = [
                'url' => Router::getUrl('register'),
                'class' => 'right' . ( Router::getUrl('register') == $_SERVER['REQUEST_URI'] ? ' active' : ''),
                'title' => 'Registruotis',
            ];
            $nav[] = [
                'url' =>Router::getUrl('login'),
                'class' => 'right' . ( Router::getUrl('login') == $_SERVER['REQUEST_URI'] ? ' active' : ''),
                'title' => 'Prisijungti',
            ];
        }

        parent::__construct($nav);
    }

    public function render(string $template_path = ROOT . '/app/templates/partials/nav.tpl.php')
    {
        return parent::render($template_path);
    }
}