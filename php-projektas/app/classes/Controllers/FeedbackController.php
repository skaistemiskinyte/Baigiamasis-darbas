<?php


namespace App\Controllers;


use App\App;
use App\Views\Feedback\FeedbackForm;
use App\Views\Pages\BasePage;
use App\Views\Pages\RegisterPage;
use App\Views\User\RegisterForm;
use Core\FileDB;
use Core\Router;
use Core\Views\Content;

class FeedbackController extends \App\Abstracts\Controller
{

    /**
     * @inheritDoc
     */
    function index(): ?string
    {
        $this->page = new BasePage();
        $form = new FeedbackForm();
        $username = App::$session->getUser();

        if ($username) {
            if ($form->isSubmitted() && $form->validate()) {

                $user = App::$db->getRowWhere('users', ['user_name' => $username]);
                $user_id = key($user);
                $user = reset($user);

                $data = [
                    'text' => $form->getFeedbackText(),
                    'name' => $user['first_name'],
                    'user_id' => $user_id,
                    'timestamp' => time(),
                ];
                if (false !== App::$db->insertRow('feedbacks', $data)) {
                    header('Location: ' . Router::getUrl('feedback'));
                    exit;
                }
            }
        }

        $this->page->setContent((new Content([
            'feedbacks' => App::$db->getAll('feedbacks'),
            'form' => $form->render(),
            'username' => $username,
        ]))->render('feedback.php'));

        return $this->page->render();
    }
}