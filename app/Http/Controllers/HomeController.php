<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DonationDue;
use App\Models\Payment;
use App\Models\Notification;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('member.home');
    }

    public function profile()
    {
        return view('member.profile');
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
            'phone_number' => 'required|numeric',
        ]);

        //Find User
        $userFinder = Crypt::decrypt($id);

        $profile = User::findorfail($userFinder);

        $profile->update([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'occupation' => $request->occupation,
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

    public function donation_dues()
    {
        $donation_dues = DonationDue::latest()->get();
        return view('member.donations_dues',[
            'donation_dues' => $donation_dues
        ]);
    }

    public function make_payment($id, Request $request) 
    {
        $Finder = Crypt::decrypt($id);

        $donation_dues = DonationDue::findorfail($Finder);

        $payments = Payment::latest()->where('membership_id', Auth::user()->membership_id)->get();

        if ($payments->isEmpty()) 
        {
            $SECRET_KEY = config('app.paystack_secret_key');;

            $url = "https://api.paystack.co/transaction/initialize";

            $fields = [
                'email' => Auth::user()->email,
                'amount' => $donation_dues->amount * 100,
                'callback_url' => url('/member/payment/callback'),
                'metadata' => [
                    'donation_due_id' => $donation_dues->id,
                    'donation_due_title' => $donation_dues->title,
                    'membership_id' => Auth::user()->membership_id,
                    'name' => Auth::user()->first_name. ' ' .Auth::user()->second_name
                ]
            ];

            $fields_string = http_build_query($fields);
            //open connection
            $ch = curl_init();
            
            //set the url, number of POST vars, POST data
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                "Authorization: Bearer $SECRET_KEY",
                "Cache-Control: no-cache",
            ));
            
            //So that curl_exec returns the contents of the cURL; rather than echoing it
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
            
            //execute post
            $paystack_result = curl_exec($ch);
            
            $result = json_decode($paystack_result);

            //  return $result;
            $authorization_url = $result->data->authorization_url;
            $paystack_status = $result->status;

            // return dd($result->status);

            if ($paystack_status == true) {
                return redirect()->to($authorization_url);
            } else {
                return back()->with([
                    'type' => 'danger',
                    'message' => 'Payment failed. Response not ok'
                ]); 
            }
        } else {
            foreach ($payments as $payment) {
                $donation_due[] = $payment->donation_due_id;
            }
            if (in_array($donation_dues->id, $donation_due)) {
                return back()->with([
                    'type' => 'danger',
                    'message' => 'Payment has been made!'
                ]);
            } else {
                $SECRET_KEY = config('app.paystack_secret_key');;

                $url = "https://api.paystack.co/transaction/initialize";

                $fields = [
                    'email' => Auth::user()->email,
                    'amount' => $donation_dues->amount * 100,
                    'callback_url' => url('/member/payment/callback'),
                    'metadata' => [
                        'donation_due_id' => $donation_dues->id,
                        'donation_due_title' => $donation_dues->title,
                        'membership_id' => Auth::user()->membership_id,
                        'name' => Auth::user()->first_name. ' ' .Auth::user()->second_name
                    ]
                ];

                $fields_string = http_build_query($fields);
                //open connection
                $ch = curl_init();
                
                //set the url, number of POST vars, POST data
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    "Authorization: Bearer $SECRET_KEY",
                    "Cache-Control: no-cache",
                ));
                
                //So that curl_exec returns the contents of the cURL; rather than echoing it
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
                
                //execute post
                $paystack_result = curl_exec($ch);
                
                $result = json_decode($paystack_result);

                //  return $result;
                $authorization_url = $result->data->authorization_url;
                $paystack_status = $result->status;

                // return dd($result->status);

                if ($paystack_status == true) {
                    return redirect()->to($authorization_url);
                } else {
                    return back()->with([
                        'type' => 'danger',
                        'message' => 'Payment failed. Response not ok'
                    ]); 
                }
            }
        }
    }

    public function handleGatewayCallback()
    {
        $SECRET_KEY = config('app.paystack_secret_key');
        
        $curl = curl_init();

        $reference = isset($_GET['reference']) ? $_GET['reference'] : '';
            if(!$reference){
            die('No reference supplied');
        }
  
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($reference),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer $SECRET_KEY",
                "Cache-Control: no-cache",
            ),
        ));
        
        $paystack_response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
            
        $result = json_decode($paystack_response);
        
        if ($err) {
            // there was an error contacting the Paystack API
            die('Curl returned error: ' . $err);
        } else {
            // dd($result);

            Payment::create([
                'donation_due_id' => $result->data->metadata->donation_due_id,
                'donation_due_title' => $result->data->metadata->donation_due_title,
                'membership_id' => $result->data->metadata->membership_id,
                'name' => $result->data->metadata->name,
                'email' => $result->data->customer->email,
                'amount' => ($result->data->amount / 100),
                'transaction_id' => $result->data->id,
                'ref_id' => $result->data->reference,
                'paid_at' => $result->data->paid_at,
                'status' => $result->data->status,
            ]);

            return redirect()->route('payment.history')->with([
                'type' => 'success',
                'message' => 'Payment Successful'
            ]);
        }
    }

    public function payment_history()
    {
        $payments = Payment::latest()->get();
        return view('member.payment_history',[
            'payments' => $payments
        ]);
    }

    public function messages_notifications()
    {
        $personal_notifications = Notification::latest()->where('to', Auth::user()->id)->get();
        $general_notifications = Notification::latest()->where('to', 'Members')->get();

        return view('member.messages_notifications', [
            'personal_notifications' => $personal_notifications,
            'general_notifications' => $general_notifications
        ]);
    }

    public function read_message($id) { 
        $notification_id = Crypt::decrypt($id);

        $notification = Notification::findorfail($notification_id);
        
        $notification->status = 'Read';
        $notification->seen += 1;
        $notification->save();

        return back();
    }
}
