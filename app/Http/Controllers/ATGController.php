<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;

class ATGController extends Controller
{

    public function addData(){
        
        // $this->validate(request(), [
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users',
        //     'pincode' => 'required|unique:users|size:6'
        // ]);

        $data = Validator::make(request()->all(),[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'pincode' => ['required', 'string', 'size:6']
        ])->validate();


        $data = User::create($data);

        $data->save();

        session()->flash('message', 'Data submitted successfully');

        return redirect('/');
    }
}
