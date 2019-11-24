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
    public function getRequestType()
    {
        if (request()->headers->get('Content-Type') == 'application/json') {
          return true;
        }else{
            return false;
        }
    }

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
        
        if ($this->getRequestType()) {
            if($validator->fails()) return response()->json(['message'=>$validator->errors(),'data' => null],400);
        }else{
            $validator->validate();
        }
        
        $user = User::create($request->all());
        $this->sendMail();

        if ($this->getRequestType()) {
            if($user){
                return response()->json(['data' => $user,'message'=> 'Created user successfully'],201);
            }else{
                return response()->json(['data' => null,'message'=> 'Error creating user'],400);
            }
        }else{
            if($user){
                session()->flash('message', 'Data submitted successfully');
                return redirect('/');
            }else{
                session()->flash('message', 'Could not create user');
                return redirect('/');
            }
        }

    }

    // public function deleteUser(Request $request, $id)
    // {
    //     // $del = $user->delete();
    //     $del = User::find($id)->delete();

    //     if ($this->getRequestType()) {
    //         if ($del) {
    //             return response()->json(['data' => null, 'message' => 'Data deleted successfully'], 204);
    //         }else{
    //             return response()->json(['data' => null, 'message' => 'Error deleting data'], 400);
    //         }
    //     }else {
    //         if ($del) {
    //             session()->flash('message', 'Data deleted successfully');
    //             return redirect('/');
    //         }else{
    //             session()->flash('message', 'Error deleting data');
    //             return redirect('/');
    //         }
    //     }

    // }

}
