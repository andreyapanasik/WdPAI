<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/Topic.php';

class TopicsRepository extends Repository
{
    public function addTopic(int $userID, string $label, string $description)
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.topics (user_id, label, description) VALUES (:userID, :label, :description)
        ');
        $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
        $stmt->bindParam(':label', $label, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function removeTopic(int $topicID)
    {
        $stmt = $this->database->connect()->prepare('
            DELETE FROM public.topics WHERE id = :topicID
        ');
        $stmt->bindParam(':topicID', $topicID, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function getTopic(int $topicID): ?Topic
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.topics WHERE id = :topicID
        ');
        $stmt->bindParam(':topicID', $topicID, PDO::PARAM_INT);
        $stmt->execute();

        $topic = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($topic) {

            return new Topic(
                $topic['id'],
                $topic['user_id'],
                $topic['label'],
                $topic['description']
            );
        } else {

            return null;
        }
    }

    public function getTopics(): ?array
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.topics
        ');
        $stmt->execute();

        $topics = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($topics) {
            foreach ($topics as $topic) {

                $output[] = new Topic(
                    $topic['id'],
                    $topic['user_id'],
                    $topic['label'],
                    $topic['description']
                );
            }
        } else {
            $output[] = new Topic(
                122,
                1,
                "No topics yet",
                ""
            );
        }
        return $output;
    }
}