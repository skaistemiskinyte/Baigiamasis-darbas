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
                'title' => 'Home',
            ],
        ];
        if (App::$session->getUser()) {
            $nav[] = [
                'url' => Router::getUrl('feedback'),
                'class' => 'left',
                'title' => 'Feedback',
            ];
            $nav[] = [
                'url' => Router::getUrl('logout'),
                'class' => 'left',
                'title' => 'Logout',
            ];

        } else {
            $nav[] = [
                'url' => Router::getUrl('feedback'),
                'class' => 'left',
                'title' => 'Feedback',
            ];
            $nav[] = [
                'url' => Router::getUrl('register'),
                'class' => 'right',
                'title' => 'Register',
            ];
            $nav[] = [
                'url' =>Router::getUrl('login'),
                'class' => 'right',
                'title' => 'Login',
            ];
        }

        parent::__construct($nav);
    }

    public function render(string $template_path = ROOT . '/app/templates/partials/nav.tpl.php')
    {
        return parent::render($template_path);
    }
}