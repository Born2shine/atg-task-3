<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

use Mail;
use App\User;
use App\Mail\SendMail;

trait RegisterScopes
{
    // public function getRequestType()
    // {
    //     if (request()->headers->get('Content-Type') == 'application/json') {
    //       return true;
    //     }else{
    //         return false;
    //     }
    // }

    public function sendMail()
    {
        Mail::send(new SendMail());

        if(Mail::failures()){
            Log::error('Oops! error sending mail');
        }else{
            Log::info('Email sent');
        }
        return;
    }

    public function register(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $status = 'error';
            $res = [
                'data' => $validator->messages(),
                'status' => 'error'
            ];

        }else{
            $user = User::create($request->all());
            $this->sendMail();
            $status = 'success';
            $res = [
                'data' => 'Data submitted successfully',
                'status' => 'success'
            ];

        }

         return response()->json($res, 200);
        
        // if ($this->getRequestType()) {
        //     if($validator->fails()) return response()->json(['message'=>$validator->errors(),'data' => null],400);
        // }else{
        //     $validator->validate();
        // }
        
        // $user = User::create($request->all());
        // $this->sendMail();

        // if ($this->getRequestType()) {
        //     if($user){
        //         return response()->json(['data' => $user,'message'=> 'Created user successfully'],201);
        //     }else{
        //         return response()->json(['data' => null,'message'=> 'Error creating user'],400);
        //     }
        // }else{
        //     if($user){
        //         session()->flash('message', 'Data submitted successfully');
        //         return redirect('/');
        //     }else{
        //         session()->flash('message', 'Could not create user');
        //         return redirect('/');
        //     }
        // }

    }

}
