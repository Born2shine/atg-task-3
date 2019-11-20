<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ATGController extends Controller
{
    public function addData(){
        // $email = request('email');

        // if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //     dd($email);
        // }else{
        //     return back()->withErrors([
        //         'message' => 'Email address is not valid'
        //     ]);
        // }
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'pincode' => 'required|unique:users|size:6'
        ]);

        $data = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'pincode' => request('pincode')
        ]);

        $data->save();

        session()->flash('message', 'Data submitted successfully');

        return redirect('/');
    }
}
