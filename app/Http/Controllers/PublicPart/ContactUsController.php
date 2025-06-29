<?php

namespace App\Http\Controllers\PublicPart;

use App\Http\Controllers\Controller;
use App\Mail\ContactUs\SendUsMessage;
use App\Traits\Http\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ContactUsController extends Controller{
    use ResponseTrait;

    protected string $_path = 'public-part.app.contact-us.';
    protected string $_base_email = 'no-reply@fondacijaekipa.ba';

    /**
     * Send us an email
     * @param Request $request
     * @return bool|\Illuminate\Http\JsonResponse|string
     */
    public function sendUsAMessage(Request $request){
        try{
            $name = $request->name . " " . $request->surname;

            Mail::to($request->email)->send(new SendUsMessage('Kopija - Kontakt forma', 'No-Reply', $this->_base_email, $name, $request->email, $request->program, $request->message));

            /*
             *  To Admins;
             *  ToDo - Replace an email
             * */
            Mail::to("akademija@fondacijaekipa.ba")->send(new SendUsMessage('Kontakt forma', $name, $request->email, $name, $request->email, $request->program, $request->message));

            return $this->jsonSuccess(__('Poruka uspješno poslana'));
        }catch (\Exception $e){
            return $this->jsonResponse('1200', __('Poruka uspješno poslana'));
        }
    }

    public function removeMyProfile(): View{
        try{

            return view('public-part.app.pages.remove-my-profile');
            dd("wee");
            $name = $request->name . " " . $request->surname;

            Mail::to($request->email)->send(new SendUsMessage('Kopija - Kontakt forma', 'No-Reply', $this->_base_email, $name, $request->email, $request->program, $request->message));

            /*
             *  To Admins;
             *  ToDo - Replace an email
             * */
            Mail::to("akademija@fondacijaekipa.ba")->send(new SendUsMessage('Kontakt forma', $name, $request->email, $name, $request->email, $request->program, $request->message));

            return $this->jsonSuccess(__('Poruka uspješno poslana'));
        }catch (\Exception $e){
            return $this->jsonResponse('1200', __('Poruka uspješno poslana'));
        }
    }
}
