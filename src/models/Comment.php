<?php

class Comment
{
    private $id;
    private $topic_id;
    private $user_id;
    private $content;

    public function __construct($id, $topic_id, $user_id, $content)
    {
        $this->id = $id;
        $this->topic_id = $topic_id;
        $this->user_id = $user_id;
        $this->content = $content;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getTopicId()
    {
        return $this->topic_id;
    }

    public function setTopicId($topic_id): void
    {
        $this->topic_id = $topic_id;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function setUserId($user_id): void
    {
        $this->user_id = $user_id;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content): void
    {
        $this->content = $content;
    }
}