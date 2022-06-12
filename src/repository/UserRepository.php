<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/User.php';

class UserRepository extends Repository
{

    public function getUser(string $attribute, string $value): ?User
    {
        $stmt = new PDOStatement();
        if ($attribute == 'username') {
            $stmt = $this->database->connect()->prepare('
                SELECT * FROM public.users WHERE username = :value
            ');
        } else if ($attribute == 'email') {
            $stmt = $this->database->connect()->prepare('
                SELECT * FROM public.users WHERE email = :value
            ');
        } else {
            $stmt = $this->database->connect()->prepare('
                SELECT * FROM public.users WHERE id = :value
            ');
        }
        $stmt->bindParam(':value', $value, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user == false) {
            return null;
        }
        return new User(
            $user['id'],
            $user['group_id'],
            $user['username'],
            $user['email'],
            $user['password']
        );
    }

    public function getUsers(int $group_id): ?array
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users WHERE group_id = :group_id
        ');
        $stmt->bindParam(':group_id', $group_id, PDO::PARAM_INT);
        $stmt->execute();

        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($users) {
            foreach ($users as $user) {

                $output[] = new User(
                    $user['id'],
                    $user['group_id'],
                    $user['username'],
                    $user['email'],
                    $user['password']
                );
            }
        } else {
            $output[] = new User(
                null,
                null,
                "There is no users registered in system",
                '',
                ''
            );
        }
        return $output;
    }

    public function setUser(int $group_id, string $username, string $email, string $password)
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.users (group_id, username, email, password)
            VALUES (:group_id, :username, :email, :password)
        ');
        $stmt->bindParam(':group_id', $group_id, PDO::PARAM_INT);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function modifyUser(string $attribute, string $value, int $id)
    {
        $stmt = new PDOStatement();
        if ($attribute == 'username') {
            $stmt = $this->database->connect()->prepare('
                UPDATE public.users SET username = :value WHERE id = :id
            ');
        } else if ($attribute == 'email') {
            $stmt = $this->database->connect()->prepare('
                UPDATE public.users SET email = :value WHERE id = :id
            ');
        } else {
            $stmt = $this->database->connect()->prepare('
                UPDATE public.users SET password = :value WHERE id = :id
            ');
        }
        $stmt->bindParam(':value', $value, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}