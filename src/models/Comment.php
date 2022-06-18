<?php

class Comment
{
    private $id;
    private $topic_id;
    private $username;
    private $content;
    private $date;

    public function __construct($id, $topic_id, $username, $content, $date)
    {
        $this->id = $id;
        $this->topic_id = $topic_id;
        $this->username = $username;
        $this->content = $content;
        $this->date = $date;
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

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username): void
    {
        $this->username = $username;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content): void
    {
        $this->content = $content;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date): void
    {
        $this->date = $date;
    }
}