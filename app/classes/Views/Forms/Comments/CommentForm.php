<?php

namespace App\Views\Forms\Comments;

use Core\Views\Form;

class CommentForm extends Form
{
    public function __construct($data = [])
    {
        $form = [
            'attr' => [
                'method' => 'POST',
                'class' => 'comment_form',
                'id' => 'comment_form',
            ],
            'callbacks' => [
                'success' => 'form_success',
                'fail' => 'form_fail',
            ],
            'fields' => [
                'comment' => [
                    'label' => 'Komentaras',
                    'type' => 'textarea',
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Jūsų Komentaras...',
                        ],
                    ],
                    'validators' => [
                        'validate_field_not_empty',
                        'validate_field_range' =>
                            [
                                'min' => 0,
                                'max' => 500,
                            ]
                    ],
                ],
            ],
            'buttons' => [
                'save' => [
                    'title' => 'Pridėti',
                    'extra' => [
                        'attr' => [
                            'class' => 'button',
                        ],
                    ],
                ],
            ],
        ];
        parent::__construct($form);
    }
}