<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Traits\RegisterScopes;
use Illuminate\Support\Facades\Validator;



class ATGController extends Controller
{

    use RegisterScopes;

    public function index()
    {
        return view('register');
    }

    public function validator(array $data)
    {
        return Validator::make($data,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'pincode' => ['required', 'string', 'size:6', 'unique:users']
        ]);
    }

}
