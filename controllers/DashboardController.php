<?php

require_once 'AppController.php';

class DashboardController extends AppController {

    public function dashboard() {
        $hello = 'Welcome on Dahboard page!';
        return $this->render('dashboard', ['greetings' => $hello]);
    }
}