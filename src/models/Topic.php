<?php

class Topic
{
    private $id;
    private $user_id;
    private $label;
    private $description;

    public function __construct($id, $user_id, $label, $description)
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->label = $label;
        $this->description = $description;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function setUserId($user_id): void
    {
        $this->user_id = $user_id;
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function setLabel($label): void
    {
        $this->label = $label;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description): void
    {
        $this->description = $description;
    }

    public function __toString(): string
    {
        return "Topic [ id = " . $this->id . ",\nuser_id = " . $this->user_id . ",\nlabel = " . $this->label . ",\ndescription = " . $this->description . " ]";
    }

}