<?php

namespace App\Http\Controllers\Api;


use Auth;
use App\Models\User;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    //
    public function index()
    {
        return response()->json(User::with(['orders'])->get());
        // return "hello";
    }

    //
    // function check login
    // email : admin@devtest.com
    // password: secret
    public function login(Request $request)
    {
        $status = 401;
        $response = ['error' => 'Unauthorised'];

        if (Auth::attempt($request->only(['email', 'password']))) {
            $status = 200;
            $response = [
                'user' => Auth::user(),
                'token' => Auth::user()->createToken('bigStore')->accessToken,
            ];
        }

        return response()->json($response, $status);
    }


    //
    // dang ki mot tai khoan moi
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'c_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $data = $request->only(['name', 'email', 'password']);
        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);
        $user->is_admin = 0;

        return response()->json([
            'user' => $user,
            'token' => $user->createToken('bigStore')->accessToken,
        ]);
    }

    

    // gets the details of a user and returns them.
    public function show(User $user)
    {
        return response()->json($user);
    }


    //gets all the orders of a user and returns them.
    public function showOrders(User $user)
    {
        return response()->json($user->orders()->with(['product'])->get());
    }


}
