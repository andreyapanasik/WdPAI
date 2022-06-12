<?php

class User
{
    private $id;
    private $group_id;
    private $username;
    private $email;
    private $password;

    public function __construct($id, $group_id, $username, $email, $password)
    {
        $this->id = $id;
        $this->group_id = $group_id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getGroupId()
    {
        return $this->group_id;
    }

    public function setGroupId($group_id): void
    {
        $this->group_id = $group_id;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username)
    {
        $this->username = $username;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
    }
}