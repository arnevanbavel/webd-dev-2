<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscriber;
use Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     * 
    public function __construct()
    {
        $this->middleware('auth');
    }
    */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.index');
    }

    public function subscribe(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
        ]);

        $duplicate = Subscriber::where('email', $request->email )->count();

        if ($duplicate == 0) 
        {
            $subscriber = new Subscriber();
            $subscriber->email = $request->email;

            if (!$subscriber->save()) {
                return "Subscriber not saved successfully";
            }

                /*$emailTo =  $subscriber->email;

                Mail::send('email.subs', [], function ($message)
                {

                    $message->from('arninio123@gmail.com', 'Kowloon')
                            ->subject('Subscribed to Kowloon newsletter');

                    $message->to('arne.vanbavel@hotmail.com');

                });*/
        }
        else
        {
            return back()->with('error', 'Dit email address is al geregistreerd'); 
        }

        return back()->with('success', 'U bent succesvol geabonneerd op onze nieuwsbrief!');
    }
}
