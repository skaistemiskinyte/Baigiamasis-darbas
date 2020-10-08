<?php

namespace App\Views\Pages;

use Core\Views\Content;
use App\Views\Footer;
use App\Views\Navigation;
use Core\Views\Page;

class BasePage extends Page
{

    /**
     * Čia galėsime nustatyti
     * $data['title'], $data['css'], $data['content']...
     * extend'inę šią klasę pvz.: App\Views\Pages\BasePage.php
     *
     * BasePage bus atsakinga už pagrindinius dalykus, tai
     * css, js, header ir footer
     *
     * Po to galėsime extendinti BasePage su App\Views\Pages\LoginPage.php,
     * kur nustatysime title ir content.
     */
    public function __construct()
    {
        $content = new Content();
        $nav = new Navigation();
        $footer = new Footer();
        $this->setTitle('Unknown page');
        $this->addCSS('assets/css/normalize.css');
        $this->addCSS('assets/css/style.css');
        $this->addFont("https://fonts.googleapis.com/css2?family=Roboto&display=swap");
        $this->setHeader($nav->render());
        $this->setFooter($footer->render());
    }
}