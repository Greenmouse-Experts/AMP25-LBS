<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DonationDue;
use App\Models\Notification;
use App\Models\Payment;
use App\Models\User;
use App\Models\Blog;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        $total_members = User::where('user_type', 'Member')->get();
        $donation_dues = DonationDue::latest()->take(5)->get();
        $dd = DonationDue::latest()->get();
        $payment_histories = Payment::latest()->take(5)->get();

        return view('admin.dashboard',[
            'total_members' => $total_members,
            'donation_dues' => $donation_dues,
            'dd' => $dd,
            'payment_histories' => $payment_histories
        ]);
    }

    public function members()
    {
        return view('admin.add_member');
    }

    public function add_member(Request $request) 
    {
        //Validate Request
        $this->validate($request, [
            'title' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255']
        ]);
        
        User::create([
            'user_type' => 'Member',
            'title' => $request->title,
            'name' => $request->name,
            'membership_id' => 'AMP25-LBS-'.$this->membership_id(4),
            'password' => Hash::make('Password'),
        ]);

        return back()->with([
            'type' => 'success',
            'message' => 'Member Created Successfully!'
        ]);         
    }

    function membership_id($input, $strength = 4) 
    {
        $input = '0123456789';
        $input_length = strlen($input);
        $random_string = '';
        for($i = 0; $i < $strength; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }
    
        return $random_string;
    }

    public function view_members()
    {
        $members = User::where('user_type', 'Member')->get();

        return view('admin.view_members',[
            'members' => $members
        ]);
    }

    public function update_member($id, Request $request) 
    {
        //Find User
        $userFinder = Crypt::decrypt($id);

        $member = User::findorfail($userFinder);

        if($member->email == $request->email)
        {
            $member->update([
                'title' => $request->title,
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'address' => $request->address,
                'occupation' => $request->occupation,
            ]);

            return back()->with([
                'type' => 'success',
                'message' => 'Member Updated Successfully!'
            ]); 
        } else {
            //Validate Request
            $this->validate($request, [
                'email' => ['string', 'email', 'max:255', 'unique:users'],
            ]);

            $member->update([
                'title' => $request->title,
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'address' => $request->address,
                'occupation' => $request->occupation,
            ]);

            return back()->with([
                'type' => 'success',
                'message' => 'Member Updated Successfully!'
            ]); 
        }       
    }

    public function delete_member($id) 
    {
        //Find User
        $userFinder = Crypt::decrypt($id);
  
        //Member
        User::find($userFinder)->delete();

        return back()->with([
            'type' => 'success',
            'message' => 'Member Deleted Successfully!'
        ]); 
    }

    public function payment_request()
    {
        // $donation_dues = DonationDue::latest()->get();
        return view('admin.request_payment');
    }

    public function add_payment_request(Request $request)
    {
        //Validate Request
        $this->validate($request, [
            'title' => ['required', 'string', 'max:255'],
            'amount' => ['required', 'numeric'],
            'description' => ['required', 'string'],
        ]);
        
        DonationDue::create([
            'title' => $request->title,
            'amount' => $request->amount,
            'description' => $request->description
        ]);

        return back()->with([
            'type' => 'success',
            'message' => 'Payment Request Submitted Successfully!'
        ]);         
    }
    
    public function view_payments_request()
    {
        $donation_dues = DonationDue::latest()->get();
        return view('admin.view_payment_requests', [
            'donation_dues' => $donation_dues
        ]);
    }

    public function delete_payment_request($id) 
    {
        $donationFinder = Crypt::decrypt($id);
  
        //Donation/Dues
        DonationDue::find($donationFinder)->delete();

        return back()->with([
            'type' => 'success',
            'message' => 'Payment Request Deleted Successfully!'
        ]); 
    }

    public function profile()
    {
        return view('admin.profile');
    }

    public function upload_avatar($id, Request $request) 
    {
        //Validate Request
        $this->validate($request, [
            'avatar' => 'required|mimes:jpeg,png,jpg',
        ]);

        //Find User
        $userFinder = Crypt::decrypt($id);

        //Profile
        $profile = User::find($userFinder);

        //Validate User
        if (request()->hasFile('avatar')) {
            $filename = request()->avatar->getClientOriginalName();
            if($profile->avatar) {
                Storage::delete('/public/avatars/'. $profile->avatar);
            }
            request()->avatar->storeAs('avatars', $filename, 'public');
            $profile->avatar = $filename;
            $profile->save();
            
            return back()->with([
                'type' => 'success',
                'message' => 'Profile Picture Update Successfully!'
            ]);
        } else {
            return back()->with([
                'type' => 'danger',
                'message' => 'Access denied!',
            ]);
        }
    }

    public function profile_update($id, Request $request) 
    {
        //Validate Request
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
        ]);

        //Find User
        $userFinder = Crypt::decrypt($id);

        $profile = User::findorfail($userFinder);

        $profile->update([
            'name' => $request->name,
        ]);

        return back()->with([
            'type' => 'success',
            'message' => 'Profile Updated Successfully!'
        ]); 
    }

    public function update_password ($id, Request $request) 
    {
        $this->validate($request, [
            'new_password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $userFinder = Crypt::decrypt($id);

        $user = User::findorfail($userFinder);
        
        $user->password = Hash::make($request->new_password);

        $user->save();

        return back()->with([
            'type' => 'success',
            'message' => 'Password Updated Successfully!'
        ]); 
    }

    public function message_member($member_id, Request $request)
    {
        //Validate Request
        $this->validate($request, [
            'subject' => ['required','string', 'max:255'],
            'message' => ['required', 'string'],
        ]);

        $id = Crypt::decrypt($member_id);

        $member = User::findorfail($id);

        $message = new Notification();
        $message->from = 'Admin';
        $message->to = $member->id;
        $message->subject = request()->subject;
        $message->message = request()->message;
        $message->save();

        if(!$member->email)
        {
            return back()->with([
                'type' => 'success',
                'message' => 'Message sent successfully to '.$member->name,
            ]); 
        } else {
            /** Store information to include in mail in $data as an array */
            $data = array(
                'name' => $member->name,
                'email' => $member->email
            );
            
            /** Send message to the user */
            Mail::send('emails.notification', $data, function ($m) use ($data) {
                $m->to($data['email'])->subject('AMP25 LBS Alumni Class');
            });

            return back()->with([
                'type' => 'success',
                'message' => 'Message sent successfully to '.$member->name,
            ]); 
        }
    }

    public function create_general_message()
    {
        return view('admin.create_general_message');
    }

    public function message_general(Request $request)
    {
        //Validate Request
        $this->validate($request, [
            'subject' => ['required','string', 'max:255'],
            'message' => ['required', 'string'],
        ]);

        $message = new Notification();
        $message->from = 'Admin';
        $message->to = 'Members';
        $message->subject = request()->subject;
        $message->message = request()->message;
        $message->save();

        /** Store information to include in mail in $data as an array */
        // $data = array(
        //     'name' => $member->first_name. ' ' .$member->second_name,
        //     'email' => $member->email
        // );
        
        /** Send message to the user */
        // Mail::send('emails.notification', $data, function ($m) use ($data) {
        //     $m->to($data['email'])->subject('C.S.S.O. Alumni');
        // });

        return back()->with([
            'type' => 'success',
            'message' => 'Message sent successfully'
        ]); 
    }

    public function view_messages()
    {
        $notifications = Notification::latest()->get();

        return view('admin.view_messages', compact(('notifications')));
    }

    public function view_payments()
    {
        $payments = Payment::latest()->get();

        return view('admin.view_payments', compact('payments'));
    }

    public function view_membership_requests() 
    {
        $membership_requests = MembershipRequest::latest()->get();

        return view('admin.view_membership_request', compact(('membership_requests')));
    }

    public function confirm_member($id, Request $request) 
    {
        //Find User
        $userFinder = Crypt::decrypt($id);

        $member_request = MembershipRequest::findorfail($userFinder);

        $user = User::create([
            'user_type' => 'Member',
            'membership_id' => 'CSSO-'.$this->membership_id(4),
            'title' => $member_request->title,
            'surname' => $member_request->surname,
            'first_name' => $member_request->first_name,
            'second_name' => $member_request->second_name,
            'phone_number' => $member_request->phone_number,
            'whatsapp_number' => $member_request->whatsapp_number,
            'email' => $member_request->email,
            'graduation_set_class' => $member_request->graduation_set_class,
            'state_of_origin' => $member_request->state_of_origin,
            'occupation' => $member_request->occupation,
            'password' => Hash::make('Password'),
        ]);

        /** Store information to include in mail in $data as an array */
        $data = array(
            'name' => $member_request->title. ' ' .$member_request->surname. ' ' .$member_request->first_name. ' ' .$member_request->second_name,
            'membership_id' => $user->membership_id,
            'email' => $member_request->email
        );
        
        /** Send message to the user */
        Mail::send('emails.approve_membership_request', $data, function ($m) use ($data) {
            $m->to($data['email'])->subject('C.S.S.O OBOSI ALUMNI ASSOCIATION');
        });
        

        MembershipRequest::find($userFinder)->delete();

        return back()->with([
            'type' => 'success',
            'message' => 'Successfully Made a Member!'
        ]);         
    }

    public function decline_member($id) 
    {
        //Find User
        $userFinder = Crypt::decrypt($id);

        $member_request = MembershipRequest::findorfail($userFinder);

        /** Store information to include in mail in $data as an array */
        $data = array(
            'name' => $member_request->title. ' ' .$member_request->surname. ' ' .$member_request->first_name. ' ' .$member_request->second_name,
            'email' => $member_request->email
        );
        
        /** Send message to the user */
        Mail::send('emails.decline_membership_request', $data, function ($m) use ($data) {
            $m->to($data['email'])->subject('C.S.S.O OBOSI ALUMNI ASSOCIATION');
        });
        

        MembershipRequest::find($userFinder)->delete();

        return back()->with([
            'type' => 'success',
            'message' => 'Membership Request Declined Successfully!'
        ]); 
    }

    public function blog()
    {
        return view('admin.blog');
    }

    public function post_blog(Request $request)
    {
        //Validate Request
        $this->validate($request, [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'image' => 'required|mimes:jpeg,png,jpg',
        ]);
        
        $filename = request()->image->getClientOriginalName();
        request()->image->storeAs('blogs', $filename, 'public');

        Blog::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $filename
        ]);

        return back()->with([
            'type' => 'success',
            'message' => 'Blog Added Successfully!'
        ]);
    }

    public function view_blogs()
    {
        $blogs = Blog::latest()->get();

        return view('admin.view_blogs',[
            'blogs' => $blogs
        ]);
    }
}
