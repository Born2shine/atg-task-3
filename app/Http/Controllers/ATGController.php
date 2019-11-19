<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ATGController extends Controller
{
    public function addData(){
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email:rfc,dns|unique:users',
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
