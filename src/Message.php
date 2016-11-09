<?php
namespace VoipCheapSMS;

class Message
{
    public $text;
    public $to;

    public static function builder($to = null, $text = null)
    {
        return new static($to, $text);
    }

    public function __construct($to = null, $text = null)
    {
        $this->to = $to;
        $this->text = $text;
    }

    public function text($text)
    {
        $this->text = $text;
        return $this;
    }

    public function to($to)
    {
        $this->to = $to;
        return $this;
    }
}
