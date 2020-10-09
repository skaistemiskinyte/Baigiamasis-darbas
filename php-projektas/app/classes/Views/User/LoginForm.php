<?php


namespace App\Views\User;


class LoginForm extends \Core\Views\Form
{
    public array $form_data = [
        'attr' => [
            'method' => 'POST',
            'id' => 'register'
        ],
        'fields' => [
            'user_name' => [
                'label' => 'El. pašto adresas',
                'type' => 'text',
                'value' => '',
                'validators' =>
                    [
                        'validate_user_exists',
                    ],
                'extra' => [
                    'attr' => [
                        'placeholder' => 'El. pašto adresas'
                    ]
                ]
            ],
            'password' => [
                'label' => 'Slaptažodis',
                'type' => 'password',
            ],
        ],
        'buttons' => [
            'register' => [
                'title' => 'Prisijungti',
            ],
        ],
    ];

    public function __construct()
    {
        parent::__construct($this->form_data);
    }

}