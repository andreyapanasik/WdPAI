<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/Comment.php';

class CommentsRepository extends Repository
{
    public function addComment(int $topicId, int $userId, string $content)
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.comments (topic_id, user_id, content) VALUES (:topicId, :userId, :content)
        ');
        $stmt->bindParam(':topicId', $topicId, PDO::PARAM_INT);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->bindParam(':content', $content, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function getComments(int $topicID): ?array
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.comments WHERE topic_id = :topicID
        ');
        $stmt->bindParam(':topicID', $topicID, PDO::PARAM_INT);
        $stmt->execute();

        $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($comments) {
            foreach ($comments as $comment) {

                $output[] = new Comment(
                    $comment['id'],
                    $comment['topic_id'],
                    $comment['user_id'],
                    $comment['content']
                );
            }
        } else {
            $output[] = new Comment(
                null,
                null,
                null,
                "No comments yet"
            );
        }
        return $output;
    }
}