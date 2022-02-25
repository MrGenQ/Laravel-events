<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MailController extends Controller {

    public function html_email() {
        $data = array('name'=>Auth::user()->email);
        Mail::send('mail', $data, function($message) {
            $message->to(Auth::user()->email);
            $message->from(Auth::user()->email,'Vytautas');
        });
        echo Auth::user()->name . 'email sent to ' . Auth::user()->email . ' email address';
    }

}
