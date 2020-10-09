<?php

use Core\Router;

Router::add('index', '/', '\App\Controllers\IndexController', 'index');
Router::add('register', '/registruotis', '\App\Controllers\UserController', 'register');
Router::add('login', '/prisijungti', '\App\Controllers\UserController', 'login');
Router::add('logout', '/atsijungti', '\App\Controllers\UserController', 'logout');
Router::add('feedback', '/atsiliepimai', '\App\Controllers\FeedbackController', 'index');
