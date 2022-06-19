<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function index() {
        session_start();
        if ($_SESSION['isLoggedIn']) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/topics");
        }
        $this->render('login-page', 'login');
    }

    public function register() {
        $this->render('register-page', 'register');
    }
}