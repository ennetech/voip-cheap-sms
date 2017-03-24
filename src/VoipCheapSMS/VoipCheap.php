<?php
namespace VoipCheapSMS;

class VoipCheap
{
    private $from;
    private $username;
    private $password;

    private function extractValue($raw, $name)
    {
        preg_match('/<[a-z0-9:]*' . $name . '>(.*)\<\/[a-z0-9:]*' . $name . '>/', $raw, $m);
        return $m[1];
    }

    public function __construct($username,$password,$from)
    {
        $this->username = $username;
        $this->password = $password;
        $this->from = $from;
    }

    public function send(Message $message)
    {
        $u = $this->username;
        $p = $this->password;
        $f = $this->from;
        $t = $message->to;
        $text = urlencode($message->text);

        $resp = file_get_contents("https://www.voipcheap.com/myaccount/sendsms.php?username=$u&password=$p&from=$f&to=$t&text=$text");
        $esit = $this->extractValue($resp, "result");
        $description = $this->extractValue($resp, "description");

        $response = [];
        $response["esit"] = ($esit == 1 ? true : false);
        $response["description"] = $description;

        return json_encode($response);
    }
}
