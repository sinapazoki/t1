<?php

namespace App\Http\Controllers\Auth\Customer;

use Carbon\Carbon;
use App\Models\Otp;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use App\Http\Services\Message\MessageService;
use App\Http\Services\Message\SMS\SmsService;
use App\Http\Requests\Auth\Customer\LoginFormRequest;
use App\Http\Requests\Auth\Customer\LoginRegisterRequest;
use App\Http\Requests\Auth\Customer\ConfirmLoginRegisterRequest;

class LoginRegisterController extends Controller
{
    public function LoginRegisterForm()
    {

        // if(Auth::user())
        return view('site.Customer.Auth.login-register');
    }


    public function Register(LoginRegisterRequest $request)
    {

        $inputs = $request->all();
        $user = User::where('phone' , $inputs['phone'])->first();
        if(empty($user))
        {
            
            $newuser['phone'] = $inputs['phone']; 
            $newuser['password'] = rand(11111111 , 99999999); 
            $newuser['activation'] = 1; 
            $newuser['first_name'] = $inputs['first_name']; 
            $newuser['last_name'] = $inputs['last_name']; 


            $user = User::create($newuser);

        }

        $otpcode = rand(11111 , 99999);
        $token = Str::random(60);
        $otpinputs = [
            'token' => $token ,
            'user_id' => $user->id ,
            'otp_code' => $otpcode,
            'login_id' => $inputs['phone'],

        ];
        
        Otp::create( $otpinputs);
        $smsService = new SmsService();
        $smsService->setFrom(Config::get('sms.otp_from'));
        $smsService->setTo( $user->phone);
        $smsService->setText($otpcode);
        $messageService = new MessageService($smsService);
        $messageService->send();
        // dd('hi');
        return redirect()->route('login-confirm-form' , $token);
    }
  
    public function login(LoginFormRequest $request)

    {

        $inputs = $request->all();
        $user = User::where('phone' , $inputs['mobile'])->first();
        if(empty($user))
        {   

            return redirect()->route('login-register-form' )->withErrors(['mobile' => 'ابتدا باید ثبت نام را تکمیل نمایید']);


        }

        $otpcode = rand(11111 , 99999);
        $token = Str::random(60);
        $otpinputs = [
            'token' => $token ,
            'user_id' => $user->id ,
            'otp_code' => $otpcode,
            'login_id' => $inputs['mobile'],

        ];
        
        Otp::create( $otpinputs);
        $smsService = new SmsService();
        $smsService->setFrom(Config::get('sms.otp_from'));
        $smsService->setTo( $user->phone);
        $smsService->setText($otpcode);
        $messageService = new MessageService($smsService);
        $messageService->send();
        // dd('hi');
        return redirect()->route('login-confirm-form' , $token);
    }

    public function LoginConfirmForm($token)
    {
        $otp = Otp::where('token' , $token)->first();
        if(empty($otp))
        {
            return redirect()->route('login-register-form')->withErrors(['id' => 'آدرس وارد شده نا معتبر است']);
        }
        else
        {
            return view('site.Customer.Auth.login-confirm' , compact('token' , 'otp') );

        }

    }

    public function LoginConfirm(ConfirmLoginRegisterRequest $request , $token )

    {
        $inputs = $request->all();

        $otp = Otp::where('token' , $token)->where('used' , 0)->where('created_at', '<=' , Carbon::now()->subMinute(5)->toDayDateTimeString())->first();
        if(empty($otp))
        {
            return redirect()->route('login-register-form')->withErrors(['id' => 'آدرس وارد شده نا معتبر است']);

        }

        elseif($otp->otp_code !== $inputs['otp'] )
        {
            return redirect()->route('login-confirm-form')->withErrors(['id' => 'کد وارد شده صحیح نیست']);
        }
        
     
            $otp->update(['used' => 1]);
            $user = $otp->user()->first(); 
            if (empty($user->phone_verified_at))
            {
                $user->update([
                    'phone_verified_at' => Carbon::now() ,
                    'activation_date' => Carbon::now() ,
                    'status' => 1 ,

                ]);

            }

            Auth::login($user);
            return redirect()->route('home');
        
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect()->route('login-register-form');
    }

    public function LoginResendConfirm($token)
    {
        $otp = Otp::where('token' , $token)->where('created_at', '<=' , Carbon::now()->subMinute(5)->toDayDateTimeString())->first();
        if(empty($otp))
        {
            return redirect()->route('login-register-form' , $token);

        }

        $user = $otp->user()->first();
        $otpcode = rand(11111 , 99999);
        $token = Str::random(60);
        $otpinputs = [
            'token' => $token ,
            'user_id' => $user->id ,
            'otp_code' => $otpcode,
            'login_id' => $otp->login_id,

        ];
        
        Otp::create( $otpinputs);
        $smsService = new SmsService();
        $smsService->setFrom(Config::get('sms.otp_from'));
        $smsService->setTo( $user->phone);
        $smsService->setText($otpcode);
        $messageService = new MessageService($smsService);
        $messageService->send();
        return redirect()->route('login-confirm-form' , $token);

    }

}
