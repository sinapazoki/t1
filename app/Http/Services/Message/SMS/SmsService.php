<?php
namespace App\Http\Services\Message\SMS ;

use App\Http\Interfaces\MessageInterface;
use App\Http\Services\Message\SMS\MelliPayamak;

class SmsService implements MessageInterface
{

    private $from ;
    private $to ;
    private $text ;

    public function fire()
    {
        $mellipayamak = new MelliPayamak();
        return $mellipayamak->SendSmsSoap($this->from , $this->to , $this->text);
    }

    public function getFrom()
    {
        return $this->from ;
    }
    public function setFrom($from)
    {
        $this->from = $from ;
    }
    public function getText()
    {
        return $this->text ;
    }
    public function setText($text)
    {
        $this->text = $text ;
    }
    public function getTo()
    {
        return $this->to ;
    }
    public function setTo($to)
    {
        $this->to = $to ;
    }
}