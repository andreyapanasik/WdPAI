<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/Comment.php';
require_once __DIR__ . '/../repository/CommentsRepository.php';

class TopicController extends AppController
{
    private CommentsRepository $commentsRepository;
    private TopicsRepository $topicsRepository;

    public function __construct()
    {
        parent::__construct();
        $this->commentsRepository = new CommentsRepository();
        $this->topicsRepository = new TopicsRepository();
    }

    public function comments()
    {
        session_start();
        if (!$_SESSION['isLoggedIn']) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}");
        }

        $topics = $this->topicsRepository->getTopics();
        if (!$this->isPost()) {

            return $this->render('topics-page', 'topics', ['topics' => $topics]);
        }

        $topicID = $_POST['id'];
        $comments = $this->commentsRepository->getComments($topicID);

        $this->render('topic-page', 'topic', ['comments' => $comments]);
    }
}