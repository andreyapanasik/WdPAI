<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../repository/UserRepository.php';
require_once __DIR__ . '/../controllers/TopicsController.php';

class SecurityController extends AppController
{
    private $userRepository;
    private $topicsController;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
        $this->topicsController = new TopicsController();
    }

    public function login()
    {
        session_start();
        if ($_SESSION['isLoggedIn']) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/topics");
        }

        if (!$this->isPost()) {
            return $this->render('login-page', 'login');
        }

        $username = $_POST["username"];
        $password = $_POST['password'];

        if (!$username || !$password) {
            return $this->render('login-page', 'login', ['messages' => ['Please fill in blanks!']]);
        }

        $user = $this->userRepository->getUser('username', $username);
        if (!$user) {
            return $this->render('login-page', 'login', ['messages' => ['User with this username does not exist!']]);
        }

        $status = $password === $user->getPassword();
        if (!$status) {
            return $this->render('login-page', 'login', ['messages' => ['Wrong password!']]);
        }

        $_SESSION['id'] = $user->getId();
        $_SESSION['group_id'] = $user->getGroupId();
        $_SESSION['username'] = $user->getUsername();
        $_SESSION['email'] = $user->getEmail();
        $_SESSION['password'] = $user->getPassword();
        $_SESSION['isLoggedIn'] = true;

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/topics");
    }

    public function register()
    {
        session_start();
        if ($_SESSION['isLoggedIn']) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/topics");
        }

        if (!$this->isPost()) {
            return $this->render('register-page', 'register');
        }

        $group_id = $_POST['password'] === "admin" ? 1 : 2;
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST['password'];

        if (!$username || !$email || !$password) {
            return $this->render('register-page', 'register', ['messages' => ['Please fill in the blanks!']]);
        }

        $user = $this->userRepository->getUser('email', $email);
        if ($user) {
            return $this->render('register-page', 'register', ['messages' => ['Given email already exists!']]);
        }

        $user = $this->userRepository->getUser('username', $username);
        if ($user) {
            return $this->render('register-page', 'register', ['messages' => ['Given username already exists!']]);
        }

        $this->userRepository->setUser($group_id, $username, $email, $password);
        $this->render('login-page', 'login', ['messages' => ['You have registered successfully, please log in']]);
    }
}