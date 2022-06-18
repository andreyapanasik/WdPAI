<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/Comment.php';
require_once __DIR__ . '/../repository/CommentsRepository.php';

class TopicController extends AppController
{
    private CommentsRepository $commentsRepository;
    private TopicsRepository $topicsRepository;
    private UserRepository $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->commentsRepository = new CommentsRepository();
        $this->topicsRepository = new TopicsRepository();
        $this->userRepository = new UserRepository();
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

        $topicID = $_POST['topicID'];
        $comments = $this->commentsRepository->getComments($topicID);
        $topicLabel = $this->topicsRepository->getTopic($topicID)->getLabel();

        $this->render('topic-page', 'topic', ['comments' => $comments, 'topicID' => $topicID, 'topicLabel' => $topicLabel]);
    }

    public function addComment()
    {
        session_start();

        $userID = $_SESSION['id'];
        $topicID = $_POST["topicID"];

        $comments = $this->commentsRepository->getComments($topicID);
        if (!$this->isPost()) {

            return $this->render('topic-page', 'topic', ['comments' => $comments, 'topicID' => $topicID]);
        }

        $content = $_POST["content"];

        $username = $this->userRepository->getUser("id", $userID)->getUsername();
        $this->commentsRepository->addComment($topicID, $username, $content);

        $comments = $this->commentsRepository->getComments($topicID);
        $topicLabel = $this->topicsRepository->getTopic($topicID)->getLabel();

        $this->render('topic-page', 'topic', ['comments' => $comments, 'topicID' => $topicID, 'topicLabel' => $topicLabel]);
    }
}