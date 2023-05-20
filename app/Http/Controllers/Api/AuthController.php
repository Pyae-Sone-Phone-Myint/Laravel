<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Rules\CheckPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            "name" => "required|min:4",
            "email" => "required|email|unique:students,email",
            "password" => "required|min:8|confirmed",
        ]);

        // Mailing step
        $verify_code = rand(100000, 999999);

        logger("Your verify code is here :" . $verify_code);

        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->password = Hash::make($request->password);
        $student->verify_code = $verify_code;
        $student->user_token = md5($verify_code);
        $student->api_token = md5(rand(1000000, 999999));
        $student->save();

        return response()->json([
            "message" => "register successful",
        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            "email" => "required|email|exists:students,email", // mostly check in only email to check even though password is wrong
            "password" => ['required', 'min:8', new CheckPassword], // check password using checkPassword Rule;
            // "password" => "required|min:8"
        ], [
            "email.exists" => "email or password is wrong"
        ]);
        $student = Student::where("email", $request->email)->first();
        // if (!Hash::check($request->password, $student->password)) {
        //     return response()->json(['email' => "email or password is wrong"]);
        // };

        session(["auth" => $student]);

        return response()->json([
            "message" => "login successful",
            "info" => $student,
            "api_token" => $student->api_token,
        ]);
    }

    public function logout()
    {
        $student  = Student::find(session('auth')->id);
        $student->api_token = md5(rand(100000, 999999));
        $student->update();
        session()->forget('auth');
        return response()->json([
            "message" => "logout successful"
        ]);
    }
}
