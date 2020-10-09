<?php


namespace App\Views\User;


class RegisterForm extends \Core\Views\Form
{
    public array $form_data = [
        'attr' => [
            'method' => 'POST',
            'id' => 'register'
        ],
        'fields' => [
            'first_name' => [
                'label' => 'Vardas',
                'type' => 'text',
                'value' => '',
                'persist' => true,
                'validators' =>
                    [
                        'validate_field_not_empty',
                        'validate_field_range' => [
                            'min' => 1,
                            'max' => 40,
                        ]
                    ],
                'extra' => [
                    'attr' => [
                        'placeholder' => '*'
                    ]
                ]
            ],
            'last_name' => [
                'label' => 'Pavardė',
                'type' => 'text',
                'value' => '',
                'persist' => true,
                'validators' =>
                    [
                        'validate_field_not_empty',
                        'validate_field_range' => [
                            'min' => 1,
                            'max' => 40,
                        ]
                    ],
                'extra' => [
                    'attr' => [
                        'placeholder' => '*'
                    ]
                ]
            ],
            'user_name' => [
                'label' => 'El. pašto adresas',
                'type' => 'text',
                'value' => '',
                'persist' => true,
                'validators' =>
                    [
                        'validate_field_not_empty',
                        'validate_is_email',
                        'validate_user_unique',
                    ],
                'extra' => [
                    'attr' => [
                        'placeholder' => '*'
                    ]
                ]
            ],
            'password' => [
                'label' => 'Password',
                'type' => 'password',
                'persist' => true,
                'validators' =>
                    [
                        'validate_field_not_empty',
                    ],
            ],
            'telephone' => [
                'label' => 'Telefonas',
                'type' => 'text',
                'value' => '',
                'persist' => true,
                'validators' =>
                    [
                        'validate_field_is_number',
                    ],
                'extra' => [
                    'attr' => [
                        'placeholder' => ''
                    ]
                ]
            ],
            'address' => [
                'label' => 'Adresas',
                'type' => 'text',
                'value' => '',
                'persist' => true,
                'validators' =>
                    [
 //                       'validate_field_is_address',
                    ],
                'extra' => [
                    'attr' => [
                        'placeholder' => ''
                    ]
                ]
            ],
//                'password_repeat' => [
//                    'label' => 'Repeat Password',
//                    'type' => 'password',
//                    'validators' =>
//                        [
//                            'validate_field_not_empty',
//                        ],
//                ],
        ],
        'buttons' => [
            'register' => [
                'title' => 'Register',
            ],
        ],
//            'validators' => [
//                'validate_fields_match' => [
//                    'password',
//                    'password_repeat'
//                ],
//            ],
    ];

    public function __construct()
    {
        parent::__construct($this->form_data);
    }

    public function getValuesToSave()
    {
        $return = [];
        if (isset($this->getData()['fields']) && is_array($this->getData()['fields'])) {
            foreach ($this->getData()['fields'] as $field_name => $attributes) {
                if (empty($attributes['persist'])) {
                    continue;
                }
                $value = $attributes['value'];
                if ($attributes['type'] == 'password') {
                    $value = password_hash($value, PASSWORD_BCRYPT);
                }
                $return[$field_name] = $value;
            }
        }
        return $return;
    }

}