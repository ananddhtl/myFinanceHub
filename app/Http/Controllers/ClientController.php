<?php

namespace App\Http\Controllers;

use App\Models\Client;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string',
            'email' => 'required|email',
            'mobile_number' => 'required|numeric',
            'password' => 'required|string',

        ]);
        $checkEmail = DB::table('clients')->where('email', $request->email)->first();
        if ($checkEmail) {
            return response()->json([
                'status' => false,
                'message' => "This email has been already registered",
            ]);
        }

        $checkPhone = DB::table('clients')->where('mobile_number', $request->mobile_number)->first();
        if ($checkPhone) {
            return response()->json([
                'status' => false,
                'message' => "This phone number already exists",
            ]);
        }
        $password = Hash::make($request->password);
        $publicUser = new Client();
        $publicUser->fullname = $request->input('fullname');
        $publicUser->email = $request->input('email');
        $publicUser->mobile_number = $request->input('mobile_number');
        $publicUser->password = $password;
        $otp = mt_rand(1000, 9999);
        $publicUser->otp_code = $otp;

        $data = [
            'otp' => $otp,
            'email' => $request->email,
        ];
        Mail::send('emailtemplate.otp', $data, function ($message) use ($data) {
            $message->to($data['email']);
            $message->subject('Your OTP code');
            $message->from(env('MAIL_USERNAME'));
        });
        $request->session()->put('otp_code', $otp);
        $request->session()->put('sessionUserPassword', $password);
        $publicUser->save();
        return response()->json([
            'status' => true,
            'message' => "Registered successfully",
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //
    }
    public function verfiyUserOTP(Request $request, Client $client)
    {

        $otp_code = $request->input('otp_code_1') . $request->input('otp_code_2') . $request->input('otp_code_3') . $request->input('otp_code_4');

        $user = Client::where('password', session()->get('sessionUserPassword'))
            ->where('otp_code', $otp_code)
            ->first();
        if (!$user) {
            return redirect()->back()->with('message', 'You have entered the invalid OTP Code');
        }
        $request->session()->put('sessionUserId', $user->id);
        $user->verified_user = 1;
        $user->save();
        return redirect('/')->with('message', 'Your account has been verified sucesfully');
    }
    public function redirectToGoogle()
    {
        try {
            return Socialite::driver('google')->redirect();
        } catch (\Exception $e) {
            // Log or handle the exception
            return redirect()->back()->with('error', 'An error occurred during the redirection.');
        }
    }
    public function handleGoogleCallback(Request $request)
    {
        $user = Socialite::driver('google')->user();

        $existingUser = Client::where('email', $user->email)->first();

        if ($existingUser) {
            $request->session()->put('sessionUserId', $existingUser->id);
            $request->session()->save();

            $redirectUrl = $request->session()->pull('redirectUrl', '/');

            return redirect($redirectUrl)->with('message', 'Logged in successfully!');
        } else {
            $newUser = Client::create([
                'fullname' => $user->name,
                'email' => $user->email,
                'password' => bcrypt('google@123'),

            ]);

            $request->session()->put('sessionUserId', $newUser->id);

            $request->session()->save();

            $redirectUrl = $request->session()->pull('redirectUrl', '/');

            return redirect($redirectUrl)->with('message', 'Please fill all the details for the verification process');
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'useremail' => 'required|email',
            'userpassword' => 'required',
        ]);

        $email = $request->useremail;
        $password = $request->userpassword;

        $user = Client::where('email', $email)->first();

        if ($user) {

            if (Hash::check($password, $user->password)) {
                $request->session()->put('sessionUserId', $user->id);

                $request->session()->save();

                $redirectUrl = $request->session()->pull('redirectUrl', '/userdashboard');

                return redirect($redirectUrl);
            } else {
                return redirect()->back()->withErrors(['userpassword' => 'Password is incorrect.']);
            }
        } else {
            return redirect()->back()->withErrors(['useremail' => 'Email is incorrect or does not exist.']);
        }
    }
    public function updateBasicInformation(Request $request, $id)
    {

        $validatedData = $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobile_number' => 'required|string|max:255',
            'address' => 'required|string|max:255',

        ]);

        $name = $validatedData['fullname'];
        $email = $validatedData['email'];
        $mobile_number = $validatedData['mobile_number'];
        $address = $validatedData['address'];

        \DB::table('clients')->where('id', $id)->update([
            'fullname' => $name,
            'email' => $email,
            'mobile_number' => $mobile_number,
            'address' => $address,

        ]);

        return redirect()->back()->with('message', 'Data has been updated successfully');
    }
    public function updateUserPassword(Request $request, $id)
    {
        $request->validate([
            'currentpassword' => 'required',
            'newpassword' => 'nullable|min:6', // Allow password to be optional
            'confirmnewpassword' => 'required_with:newpassword|same:newpassword',
            'service_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Client::find($id);

        if (!$user) {
            return redirect()->back()->with('message', 'User not found');
        }

        if (!Hash::check($request->currentpassword, $user->password)) {
            return redirect()->back()->with('message', 'Current password is incorrect');
        }

        
        if ($request->filled('newpassword')) {
            if (Hash::check($request->newpassword, $user->password)) {
                return redirect()->back()->with('message', 'New password cannot be the same as the current password');
            }
            $user->password = Hash::make($request->newpassword);
        }

       
        if ($request->hasFile('service_image')) {
            $service_image = $request->file('service_image');
            $img_name = hexdec(uniqid()) . '.' . $service_image->getClientOriginalExtension();
            $service_image->move('uploads/client/thumbnail/', $img_name);
            $save_url = '/uploads/client/thumbnail/' . $img_name;
            $user->user_thumbnail = $save_url;
        }

        $user->save();

        return redirect()->back()->with('message', 'Profile updated successfully');
    }

}
