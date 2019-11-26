<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use App\Traits\RegisterScopes;

class WebServicesController extends Controller
{
    use RegisterScopes;

    public function validator(array $data){
        
        return Validator::make($data,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'pincode' => ['required', 'string', 'size:6', 'unique:users']
        ]);

    }

}
