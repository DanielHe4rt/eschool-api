<?php

namespace App\Http\Controllers;

use App\Entities\User\User;
use Illuminate\Support\Facades\Hash;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function generateUser(){
        User::create([
            'name' => 'danielhe4rt',
            'email' => 'hey@danielhe4rt.dev',
            'password' => Hash::make('secret'),
            'role' => 1
        ]);
    }
}
