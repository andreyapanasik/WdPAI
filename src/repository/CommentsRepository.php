<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/Comment.php';

class CommentsRepository extends Repository
{
    public function addComment(int $topicId, string $username, string $content)
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.comments (topic_id, username, content) VALUES (:topicId, :username, :content)
        ');
        $stmt->bindParam(':topicId', $topicId, PDO::PARAM_INT);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
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
                    $comment['username'],
                    $comment['content'],
                    date("Y-m-d H:i", strtotime($comment['date']))
                );
            }
        } else {
            $output[] = new Comment(
                null,
                $topicID,
                null,
                "No comments yet",
                null
            );
        }
        return $output;
    }

    public function deleteComments(int $topicID)
    {
        $stmt = $this->database->connect()->prepare('
            DELETE FROM public.comments WHERE topic_id = :topicID
        ');
        $stmt->bindParam(':topicID', $topicID, PDO::PARAM_INT);
        $stmt->execute();
    }
}