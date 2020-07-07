<?php

namespace App\Comments;

use Core\DataHolder;

class Comment extends DataHolder {

    protected function setName(string $name)
    {
        $this->name = $name;
    }

    protected function getName()
    {
        return $this->name ?? null;
    }

    protected function setId(string $id)
    {
        $this->id = $id;
    }

    protected function getId()
    {
        return $this->id ?? null;
    }

    protected function setComment(string $comment)
    {
        $this->comment = $comment;
    }

    protected function getComment()
    {
        return $this->comment ?? null;
    }

    protected function setDate(string $date)
    {
        $this->date = $date;
    }

    protected function getDate()
    {
        return $this->date ?? null;
    }
}