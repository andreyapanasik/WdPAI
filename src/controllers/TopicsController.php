<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/Topic.php';
require_once __DIR__ . '/../repository/TopicsRepository.php';

class TopicsController extends AppController
{
    private TopicsRepository $topicsRepository;
    private CommentsRepository $commentsRepository;

    public function __construct()
    {
        parent::__construct();
        $this->topicsRepository = new TopicsRepository();
        $this->commentsRepository = new CommentsRepository();
    }

    public function topics()
    {
        session_start();
        if (!$_SESSION['isLoggedIn']) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}");
        }

        $userID = $_SESSION['id'];
        $topics = $this->topicsRepository->getTopics();

        $this->render('topics-page', 'topics', ['topics' => $topics]);
    }

    public function createTopic()
    {
        session_start();

        $userID = $_SESSION['id'];
        $topics = $this->topicsRepository->getTopics();
        if (!$this->isPost()) {

            return $this->render('topics-page', 'topics', ['topics' => $topics]);
        }

        $title = $_POST["title"];
        $description = $_POST['description'];

        $this->topicsRepository->addTopic($userID, $title, $description);
        $topics = $this->topicsRepository->getTopics($userID);

        $this->render('topics-page', 'topics', ['topics' => $topics]);
    }

    public function deleteTopic()
    {
        session_start();

        $topics = $this->topicsRepository->getTopics();
        if (!$this->isPost()) {

            return $this->render('topics-page', 'topics', ['topics' => $topics]);
        }
        $topicID = $_POST["topicID"];
        if ($this->topicsRepository->getTopic($topicID)) {

            $this->commentsRepository->deleteComments($topicID);
            $this->topicsRepository->removeTopic($topicID);
        }

        $topics = $this->topicsRepository->getTopics();
        $this->render('topics-page', 'topics', ['topics' => $topics]);
    }
}