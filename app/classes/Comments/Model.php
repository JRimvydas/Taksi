<?php

namespace App\Comments;

use App\App;

class Model {
    const TABLE = 'comments';

    public static function insert(Comment $comment)
    {
        App::$db->createTable(self::TABLE);
        return App::$db->insertRow(self::TABLE, $comment->_getData());
    }

    public static function getWhere($conditions)
    {

        $rows = App::$db->getRowsWhere(self::TABLE, $conditions);
        $comments = [];

        foreach ($rows as $row) {
            $comments[] = new Comment($row);
        }

        return $comments;
    }

    public static function find(int $id): ?Comment
    {
        $comment_data = App::$db->getRowById(self::TABLE, $id);
        if ($comment_data){
            $comment = new Comment($comment_data);
            $comment->id = $id;
            return $comment;
        }
        return null;
    }

    public static function update(Comment $comment)
    {
        return App::$db->updateRow(self::TABLE, $comment->_getData(), $comment->id);
    }

    public static function delete(Comment $comment)
    {
        return App::$db->deleteRow(self::TABLE, $comment->id);
    }
}