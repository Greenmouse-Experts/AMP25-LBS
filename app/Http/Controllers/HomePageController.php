<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Blog;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;

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

    public function contactConfirm(Request $request) {
        //Validate Request
        $this->validate($request, [
            'phone' => 'required|numeric',
        ]);

        /** Store information to include in mail in $data as an array */
        $data = array(
            'name' => request()->name,
            'email' => request()->email,
            'phone' => request()->phone,
            'subject' => request()->subject,
            'description' => request()->message,
            'created_at' => now(),
            'admin' => 'admin@amp25lbs.com',
        );
        /** Send message to the admin */
        Mail::send('emails.contact', $data, function ($m) use ($data) {
            $m->to($data['admin'])->subject('Contact Form Notification');
        });

        return back()->with('success_report', 'Form Submitted Successfully');
    }

    public function membership()
    {
        return view('membership');
    }

    public function blog()
    {
        $blogs = Blog::latest()->get();

        return view('blog', [
            'blogs' => $blogs
        ]);
    }

    public function blogPost($id)
    {
        // Share Whatsapp
        $whatsapp = \Share::page(
            url("/blogPost").'/'
        )
        ->whatsapp()
        ->getRawLinks();
        // dd(htmlspecialchars($whatsapp));

        // Share Facebook
        $facebook = \Share::page(
            url("/blogPost").'/'
        )
        ->facebook()
        ->getRawLinks();

        // Share Twitter
        $twitter = \Share::page(
            url("/blogPost").'/'
        )
        ->twitter()
        ->getRawLinks();

        //Find Blog
        $Finder = Crypt::decrypt($id);
  
        //Blog
        $blog = Blog::find($Finder);
        
        $blog->views += 1;
        $blog->save();

        $blogs = Blog::latest()->where('id', '!=', $blog->id)->get();
        
        return view('view_blog', [
            'blogs' => $blogs,
            'blog' => $blog,
            'whatsapp' => $whatsapp,
            'facebook' => $facebook,
            'twitter' => $twitter
        ]);
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
