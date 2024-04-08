<?php

namespace App\Http\Controllers\PublicPart;

use App\Http\Controllers\Controller;
use App\Mail\ContactUs\SendUsMessage;
use App\Traits\Http\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller{
    use ResponseTrait;

    protected string $_path = 'public-part.app.contact-us.';
    protected string $_base_email = 'no-reply@fondacijaekipa.ba';

    public function sendUsAMessage(Request $request){
        try{
            $name = $request->name . " " . $request->surname;

            Mail::to($request->email)->send(new SendUsMessage('Kopija - Kontakt forma', 'No-Reply', $this->_base_email, $name, $request->email, $request->program, $request->message));

            /*
             *  To Admins;
             *  ToDo - Replace an email
             * */
            Mail::to($request->email)->send(new SendUsMessage('Kontakt forma', $name, $request->email, $name, $request->email, $request->program, $request->message));

            return $this->jsonSuccess(__('Poruka uspješno poslana'));
        }catch (\Exception $e){
            return $this->jsonResponse('1200', __('Poruka uspješno poslana'));
        }
    }
}
