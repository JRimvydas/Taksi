<?php

namespace App\Views\Forms\Auth;

use Core\Views\Form;

class RegistrationForm extends Form
{
    public function __construct($data = [])
    {

        $form = [
            'attr' => [
                'method' => 'POST',
            ],
            'validators' => [
                'validate_field_match' => [
                    'password',
                    'password_repeat',
                ],
                'validate_register' => [
                    'field' => 'email'
                ]
            ],
            'callbacks' => [
                'success' => 'form_success',
            ],
            'fields' => [
                'username' => [
                    'label' => 'Vardas',
                    'type' => 'text',
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Vardas',
                        ],
                    ],
                    'validators' => [
                        'validate_field_not_empty',
                        'validate_field_length' => [
                            'min' => 3,
                            'max' => 40,
                        ],
                    ],
                ],
                'surname' => [
                    'label' => 'Pavardė',
                    'type' => 'text',
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Pavardenis',
                        ],
                    ],
                    'validators' => [
                        'validate_field_not_empty',
                    ],
                ],
                'email' => [
                    'label' => 'Email',
                    'type' => 'email',
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Pastas@pastas.lt',
                        ],
                    ],
                    'validators' => [
                        'validate_field_not_empty',
                    ],
                ],
                'phone' => [
                    'label' => 'Telefono numeris',
                    'type' => 'number',
                    'extra' => [
                        'attr' => [
                            'placeholder' => '867xxxxxx (neprivalomas)',
                        ],
                    ],
                    'validators' => [

                    ],
                ],
                'address' => [
                    'label' => 'Adresas',
                    'type' => 'text',
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Jūsų adresas... (neprivalomas)',
                        ],
                    ],
                    'validators' => [

                    ],
                ],
                'password' => [
                    'label' => 'Password',
                    'type' => 'password',
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Slaptažodis',
                        ],
                    ],
                    'validators' => [
                        'validate_field_not_empty',
                        'validate_field_has_upper_case',
                        'validate_field_length' => [
                            'min' => 6,
                            'max' => 10,
                        ],
                    ],
                ],
                'password_repeat' => [
                    'label' => 'Password repeat',
                    'type' => 'password',
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Slaptažodis',
                        ],
                    ],
                    'validators' => [
                        'validate_field_not_empty',
                        'validate_field_has_upper_case',
                        'validate_field_length' => [
                            'min' => 6,
                            'max' => 10,
                        ],
                    ],
                ],
            ],
            'buttons' => [
                'save' => [
                    'title' => 'Registruotis',
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