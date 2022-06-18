<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('', 'DefaultController');
Routing::get('login', 'SecurityController');
Routing::get('createTopic', 'TopicsController');
Routing::get('deleteTopic', 'TopicsController');
Routing::get('register', 'SecurityController');
Routing::get('topics', 'TopicsController');
Routing::get('comments', 'TopicController');
Routing::get('addComment', 'TopicController');
Routing::run($path);