<?php

namespace App\Controllers;
use App\Abstracts\Controller;
use App\App;
use App\Feedback\Feedback;
use Core\Router;
use Core\Views\Content;

class IndexController extends Controller
{
    /**
     * This method builds or sets
     * current $page content
     * renders it and returns HTML
     *
     * So if we have ex.: ProductsController,
     * it can have methods responsible for
     * index() (main page, usualy a list),
     * view() (preview single),
     * create() (form for creating),
     * edit() (form for editing)
     * delete()
     *
     * These methods can then be called on each page accordingly, ex.:
     * add.php:
     * $controller = new FeedbackController();
     * print $controller->add();
     *
     *
     * my.php:
     * $controller = new ProductsController();
     * print $controller->my();
     *
     * @return string|null
     */
    function index(): ?string
    {

//        $pixels = App::$db->getRowsWhere('pixels', []);

        $content = new Content();

        $this->page->setTitle('Index');
        $this->page->setContent($content->render('index.tpl.php'));

        return $this->page->render();
    }

//    function my(): ?string
//    {
//        if (!App::$session->getUser()) {
//            header('Location:'. Router::getUrl('login'));
//            exit;
//        }
//
//        $pixels = App::$db->getRowsWhere('pixels', ['username' => $_SESSION['username']]);
//
//        $content = new Content($pixels);
//
//        $this->page->setTitle('My');
//        $this->page->setContent($content->render('my.tpl.php'));
//
//        return $this->page->render();
//    }

//    function add(): ?string
//    {
//        if (!App::$session->getUser()) {
//            header('Location:'. Router::getUrl('login'));
//            exit;
//        }
//
//        $forma = new \App\Views\Forms\FeedbackForm();
//
//        if ($forma->isSubmitted()) {
//            if ($forma->validate()) {
//                $pixel = new Feedback($forma->getSubmitData());
//
//                $pixel->setUsername(App::$session->getUser()['username']);
//                App::$db->insertRow('pixels', $pixel->_getData());
//                header('Location:'. Router::getUrl('my'));
//                exit;
//            }
//        }
//
//        $this->page->setTitle('Add');
//        $this->page->setContent($forma->render());
//        return $this->page->render();
//
//    }
}
