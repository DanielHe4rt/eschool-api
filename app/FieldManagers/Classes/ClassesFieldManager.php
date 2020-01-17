<?php


namespace App\FieldManagers\Classes;


use App\FieldManagers\FieldManager;

class ClassesFieldManager extends FieldManager
{
    protected $fields = [
        'id' => [
            'rules' => 'integer',
        ],
        'name' => [
            'rules' => 'string',
        ],
        'description' => [
            'rules' => 'string',
        ]
    ];

    public function store()
    {
        $fields = [
            'name' => 'required'
        ];
        return $this->rules($fields);
    }

    public function update()
    {
        $fields = [
            'id' => 'required|exists:classes'
        ];
        return $this->rules($fields);
    }

    public function filters() {
        return [];
    }
}
