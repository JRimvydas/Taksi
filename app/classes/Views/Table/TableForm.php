<?php

namespace App\Views\Table;

use Core\Views\Table;
use App\Comments\Model;

class TableForm extends Table
{
    public function __construct($data = [])
    {
        $table = [
            'attr' => [
                'class' => 'bottles'
            ],
            'headings' => [
                'name',
                'comment',
                'date',
            ],
            'rows' =>  $this->getTableData(),
        ];

        parent::__construct($table);
    }

    public function getTableData(): array
    {
        $comments = Model::getWhere([]);
        $rows = [];

        foreach ($comments as $comment_key => $comment) {
            $rows[] = [
                'name' => $comment->name,
                'comment' => $comment->comment,
                'date' => $comment->date,
            ];
        }

        return $rows;
    }

}