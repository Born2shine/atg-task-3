<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use App\Traits\RegisterScopes;

class WebServicesController extends Controller
{
    use RegisterScopes;

    // public function users(){

    //     return response()->json(User::get(), 200);

    // }

    // public function fetch($id){

    //     $user = User::find($id);

    //     return response()->json($user, 200);
    // }

    public function validator(array $data){
        
        return Validator::make($data,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'pincode' => ['required', 'string', 'size:6', 'unique:users']
        ]);
        
        

        // if ($validate->fails()) {
        //     dd(response()->json());

        //     throw ValidationException::withMessages([$validate->errors()]);

        //     // return response()->json(['message' => $validate->errors(),'data' => null], 400);
        // }

    }

    // public function deleteItem($id){

    //     return $id;

    // }

    // public function delete($id){
    //     User::find($id)->delete();
    //     return response()->json(['data' => null, 'message' => 'Data deleted successfully'], 204);
    // }
}
