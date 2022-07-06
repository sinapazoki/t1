<?php

namespace App\Http\Services\Message\SMS ;

use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;

class MelliPayamak
{

    private $username;
    private $password;

    public function __construct()
    {
        $this->username  = Config::get('sms.username') ;
        $this->password  = Config::get('sms.password') ;

    }

    public function SendSmsSoap($from ,  $to , $text)
    {
 
          // ersal payamak ba panel farazsms
        $response = Http::get("http://ippanel.com:8080/", [
            'apikey' => 'VuZU5kopVwrLsxgpoF5gKPt5l2049mtevxhCiZ4U5NE=',
            'pid' => '05nfg50x1v81vu6',
            'fnum' => $from,
            'tnum' => $to,
            'p1' => 'code',
            'v1' => $text,
        ]);
        
        // ini_set("soap.wsdl_cache_enabled", "0");
        // try {
        //     $client = new \SoapClient("http://ippanel.com/class/sms/wsdlservice/server.php?wsdl");
        //     $user = $this->username;
        //     $pass = $this->password;
        //     $fromNum = $from;
        //     $toNum = $to;
        //     $messageContent = $text;
        //     $op  = "send";
        //     $time = '';
        //     $CreditResult = $client->GetCredit(array("username" => "09123872446" , "password" => "faraz0014523681"))->CreditResult ;
        //     $sendResult= $client->SendSms($fromNum,$toNum,$messageContent,$user,$pass,$time,$op)->sendResult;
        //     // var_dump('4145151');

        //     if($sendResult == 1 && $CreditResult == 0)
        //     {
        //         return true ;
        //     }
        //     else
        //     {
        //         return false;
        //     }
        // }
        //     catch (\SoapFault $ex) {
        //         echo $ex->faultstring;
        //     }
     }
}