<?php

namespace App\Http\Controllers;

use App\Models\RegisterPhoneNumber;
use Illuminate\Http\Request;
use Twilio\Rest\Client;

class HomeController extends Controller
{
    public function show()
    {
        $regphnos = RegisterPhoneNumber::all(); //query db with model
        return view('welcome', compact("regphnos")); //return view with data
    }

    public function registerPhoneNumber(Request $request)
    {
        $validatedData = $request->validate([
            'phone_number' => 'required|unique:register_phone_number|numeric'
        ]);
        $register_phone_number_model = new RegisterPhoneNumber($request->all());
        $register_phone_number_model->save();
        return back()->with(['success'=>"{$request->phone_number} registered"]);
    }

    /**Send message to a selected users*/
    public function sendCustomMessage(Request $request)
    {
        $validatedData = $request->validate([
            'regphnos' => 'required|array',
            'body' => 'required',
        ]);
        $recipients = $validatedData["regphnos"];
        // iterate over the array of recipients and send a twilio request for each

        foreach ($recipients as $recipient) {
            $this->sendMessage($validatedData["body"], $recipient);
        }
        return back()->with(['success' => "Messages Send !"]);
    }

     /**Sends sms to user using Twilio's programmable sms client*/
    private function sendMessage($message, $recipients)
    {
        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_number = getenv("TWILIO_NUMBER");
        $client = new Client($account_sid, $auth_token);
        $client->messages->create($recipients, ['from' => $twilio_number, 'body' => $message]);
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('getLogin')->with('success', 'You have been successfully logged out');
    }
}
