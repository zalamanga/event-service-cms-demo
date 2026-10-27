<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthenticationController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('do_logout','profileUpdate');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'titlePage' => 'Login',
        ];

        return view('pages.admin.authentication.login', $data);
    }

    public function do_login(Request $request) {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('username')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('username'),
                ]);
            } else {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('password'),
                ]);
            }
        }

        $user = User::where('username', '=', $request->username)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                Auth::login($user);
                return response()->json([
                    'alert' => 'success',
                    'message' => 'Selamat Datang ' . $user->name,
                ]);
            } else {
                return response()->json([
                    'alert' => 'error',
                    'message' => 'Username atau Password Salah',
                ]);
            }
        } else {
            return response()->json([
                'alert' => 'error',
                'message' => 'Username atau Password Salah',
            ]);
        }
    }

    public function do_logout()
    {
        $user = Auth::user();
        Auth::logout($user);
        return redirect()->route('admin.login');
    }

    public function profileUpdate(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('name')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('name'),
                ]);
            } else if ($errors->has('username')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('username'),
                ]);
            } else if ($errors->has('password')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('password'),
                ]);
            }
        }
        $user = User::where('id', Auth::user()->id)->first();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->update();

        return response()->json([
            'alert' => 'success',
            'message' => 'Profile Berhasil Diupdate',
            'redirect' => route('admin.profile.index')
        ]);
    }
}
