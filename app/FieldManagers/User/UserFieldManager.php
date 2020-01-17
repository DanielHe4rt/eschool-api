<?php


namespace App\FieldManagers\User;


use App\FieldManagers\FieldManager;

class UserFieldManager extends FieldManager
{
    protected $fields = [
        'name' => [
            'rules' => 'string',
        ],
        'email' => [
            'rules' => 'email',
        ],
        'password' => [
            'rules' => 'string',
        ],
        'role' => [
            'rules' => 'integer',
        ],
    ];
    public function store()
    {
        $fields = [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed',
            'role' => 'required'
        ];
        return $this->rules($fields);
    }
    public function filters() {
        return [];
    }
}
