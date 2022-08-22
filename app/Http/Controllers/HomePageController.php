<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class HomePageController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function membership()
    {
        return view('membership');
    }

    public function blog()
    {
        return view('blog');
    }

    public function terms_conditions()
    {
        return view('terms_conditions');
    }

    public function privacy()
    {
        return view('privacy');
    }

    public function admin_login()
    {
        return view('auth.admin_login');
    }

    public function post_member_login(Request $request)
    {
        $this->validate($request, [
            'membership_id' => 'exists:users,membership_id',
        ]);

        $input = $request->only('membership_id', 'password');
        
        $user = User::query()->where('membership_id', $request->membership_id)->first();

        // authentication attempt
        if (auth()->attempt($input)) {
            if($user->account_type == 'Member'){
                return redirect()->route('home');
            }
           
            return back()->with('failure_report', 'You are not a Member');
        } else {
            return back()->with('failure_report', 'User authentication failed.');
        }
    }

    public function post_admin_login(Request $request)
    {
        $this->validate($request, [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);
        
        $input = $request->only(['email', 'password']);
        
        $user = User::query()->where('email', $request->email)->first();

        if ($user && !Hash::check($request->password, $user->password)){
            return back()->with('failure_report', 'Incorrect Password!');
        }

        if(!$user || !Hash::check($request->password, $user->password)) {
            return back()->with('failure_report', 'Email does\'nt exist');
        }

        // authentication attempt
        if (auth()->attempt($input)) {
            if($user->user_type == 'Administrator'){
                return redirect()->route('admin.dashboard');
            }
           
            return back()->with('failure_report', 'You are not an Administrator');
                    
        } else {
            return back()->with('failure_report', 'User authentication failed.');
        }
    }
}
