<?php


namespace App\Views\Feedback;


class FeedbackForm extends \Core\Views\Form
{
    public array $form_data = [
        'attr' => [
            'method' => 'POST',
            'id' => 'feedback'
        ],
        'fields' => [
            'feedback' => [
                'label' => 'Atsiliepimas',
                'type' => 'textarea',
                'value' => '',
                'validators' => [
                    'validate_field_not_empty',
                    'validate_field_range' => [
                        'min' => 10,
                        'max' => 500,
                    ]
                ],
                'extra' => [
                    'cols' => 60,
                    'rows' => 6,
                ]
            ],
        ],
        'buttons' => [
            'register' => [
                'title' => 'Siųsti',
            ],
        ],
    ];

    public function __construct()
    {
        parent::__construct($this->form_data);
    }

    public function getFeedbackText()
    {
        return $this->data['fields']['feedback']['value'];
    }
}