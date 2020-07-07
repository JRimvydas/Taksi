<?php

namespace App\Views\Table;

use App\Views\Forms\Drinks\BottleDeleteForm;
use App\Bottles\Model;
use Core\Views\Form;
use Core\Views\Table;
use Core\View;


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
        $comments = \App\Comments\Model::getWhere([]);
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