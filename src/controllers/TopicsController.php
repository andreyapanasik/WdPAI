<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/Topic.php';
require_once __DIR__ . '/../repository/TopicsRepository.php';

class TopicsController extends AppController
{
    private TopicsRepository $topicsRepository;

    public function __construct()
    {
        parent::__construct();
        $this->topicsRepository = new TopicsRepository();
    }

    public function topics()
    {
        session_start();
        if (!$_SESSION['isLoggedIn']) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}");
        }

        $userID = $_SESSION['id'];
        $topics = $this->topicsRepository->getTopics($userID);

        $this->render('topics-page', 'topics', ['topics' => $topics]);
    }
}