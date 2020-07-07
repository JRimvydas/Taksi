<?php

namespace App\Views\Forms\Auth;

use Core\Views\Form;

class LoginForm extends Form
{
    public function __construct($data = [])
    {

        $form = [
            'attr' => [
                'method' => 'POST',
            ],
            'validators' => [
                'validate_login',
            ],
            'callbacks' => [
                'success' => 'form_success',
                'fail' => 'form_fail',
            ],
            'fields' => [
                'email' => [
                    'label' => 'Email',
                    'type' => 'email',
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Enter email',
                        ],
                    ],
                    'validators' => [
                        'validate_field_not_empty',
                    ],
                ],
                'password' => [
                    'label' => 'Password',
                    'type' => 'password',
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Enter Password',
                        ],
                    ],
                    'validators' => [
                        'validate_field_not_empty',
                    ],
                ],
            ],
            'buttons' => [
                'save' => [
                    'title' => 'Prisijungti',
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