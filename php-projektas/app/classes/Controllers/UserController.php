<?php


namespace App\Controllers;


use App\App;
use App\Views\Pages\RegisterPage;
use App\Views\User\LoginForm;
use App\Views\User\RegisterForm;
use Core\Router;
use Core\Views\Content;

class UserController extends \App\Abstracts\Controller
{

    /**
     * @inheritDoc
     */
    function index(): ?string
    {
        // TODO: Implement index() method.
    }

    public function register()
    {

        $this->page = new RegisterPage();

        $form = new RegisterForm();
        if ($form->isSubmitted() && $form->validate()) {
            if (false !== App::$db->insertRow('users', $form->getValuesToSave())) {
                if (App::$session->login(
                    $form->getSubmitData()['user_name'] ?? null,
                    $form->getSubmitData()['password'] ?? null)
                ) {
                    header('Location: ' . Router::getUrl('index'));
                    exit;
                }
            }
        }

        $this->page->setContent((new Content([
            'form' => $form->render(),
        ]))->render('register.php'));

        return $this->page->render();
    }

    public function login()
    {

        $this->page = new RegisterPage();

        $form = new LoginForm();
        if ($form->isSubmitted() && $form->validate()) {
            if (App::$session->login(
                $form->getSubmitData()['user_name'] ?? null,
                $form->getSubmitData()['password'] ?? null)
            ) {
                header('Location: ' . Router::getUrl('index'));
                exit;
            }
        }

        $this->page->setContent((new Content([
            'form' => $form->render(),
        ]))->render('register.php'));

        return $this->page->render();
    }

    /**
     * Logs user out
     */
    public function logout()
    {
        App::$session->logout(Router::getUrl('index'));
    }
}