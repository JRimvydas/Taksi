<?php

namespace App\Views\Table;

use App\App;
use Core\Views\Table;

class CommentTable extends Table
{
    public function __construct($data = [])
    {
        $table = [
            'attr' => [
                'class' => 'bottles'
            ],
            'headings' => [
                'Vardas',
                'Komentaras',
                'Data'
            ],
            'rows' => $this->getCommentData(),
        ];

        parent::__construct($table);
    }

    public function getCommentData()
    {
        $comments = \App\Comments\Model::getWhere([]);
        $rows = [];

        foreach ($comments as $comm_key => $comment) {
            $rows[] =[
                'name' =>$comment->name,
                'comment' => $comment->comment,
                'date' => $comment->date,
            ];
        }
        return $rows;
    }
}