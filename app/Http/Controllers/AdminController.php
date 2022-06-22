<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Crypt;
use Session;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminForgotPassword;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function adminLogin(Request $request)
    {
        $input = $request->all();
        $this->validate($request, ['email' => 'required|email', 'password' => 'required', ], ['email.required' => 'Email is required','email.email' => 'Please enter valid email', 'password.required' => 'Password is required',
        ]);

        if ($request->rememberme === null){
            setcookie('login_email', $request->email, 100);
            setcookie('login_pass', $request->password, 100);
        }
        else{
            setcookie('login_email', $request->email, time() + 60 * 60 * 24 * 100);
            setcookie('login_pass', $request->password, time() + 60 * 60 * 24 * 100);
        }
        if (Auth::attempt(['email' => $input['email'], 'password' => $input['password']])){
            Session::put('admin_session', $input['email']);
            return redirect('/admin/dashboard');
        }
        else{
            return redirect()->back()->with('flash_message_error', 'Invalid Credentials ');
        }
    }

    public function adminPasswordReset(Request $request)
    {
        if ($request->isMethod('post')){
            $adminData = User::select('id', 'email')->where('email', '=', $request->email)->first();
            if ($adminData){
                $token = md5($request->email);
                User::where('email', $request->email)->update(['token' => $token]);
            }
            if (empty($adminData)){
                return redirect()->back()->with('flash_message_error', 'Email does not exist !');
            }
            else{
                //mail with link
                Mail::to($request->email)->send(new AdminForgotPassword($adminData,$token ));
                return redirect()->back()->with('flash_message_success', 'Password reset Mail Sent Successfully !');
            }
        }
        else{
            return view('admin.passwordReset');
        }
    }

    #Password Reset
    public function adminPassResetUpdate(Request $request, $token = null)
    {
        if ($token)
        {
            if ($request->isMethod('post')){

                $validatedData = $request->validate(['new_password' => 'required|min:6', 'new_confirm_password' => 'required|min:6|same:new_password', ]);

                $adminCredentialupdate = User::where('token', $token)->first();
                if ($adminCredentialupdate){
                    $adminCredentialupdate->token = 'NULL';
                    $adminCredentialupdate->password = Hash::make($request->new_confirm_password);
                    $adminCredentialupdate->save();
                    return redirect()->route('admin.login')->with('flash_message_success', 'Your Password Reset Successfully! Now you can Login');
                }
                else{
                    return redirect('/admin-login')->with('flash_message_error', 'Something went wrong!');
                }
            }
            else{
                return view('admin.passwordresetupdate', compact('token'));
            }
        }
    }

    public function dashboard(){
        return view('dashboard');
    }

    public function logout()
    {
        Session::forget('admin_session');
        Auth::logout();
        return redirect('/')->with('flash_message_success', 'You are logged Out');
    }
}

