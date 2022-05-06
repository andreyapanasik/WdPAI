<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function index() {
        $this->render('page-login', 'login');
    }

    public function register() {
        $this->render('page-login', 'register');
    }
}