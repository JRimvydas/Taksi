<?php

use App\App;

$comment = new \App\Views\Table\CommentTable();


function form_success(array &$form, array $form_values)
{
    $comment = new \App\Comments\Comment($form_values);
    $comment->id = App::$session->getUser()->id;
    $comment->name = App::$session->getUser()->username;
    $comment->date = date("Y-m-d h:i:sa");
    \App\Comments\Model::insert($comment);
}

function form_fail(array &$form, array $form_values)
{
    $form['message']['error'] = 'Komentaras yra tuščias';
}

$form = new \App\Views\Forms\Comments\CommentForm();
$form->validate();
