# voip-cheap-sms
This simple package allows you to send sms via voipcheap service

add the dependency with composer:

composer require enne/voip-cheap-sms:dev-master

use it in you code:

        use \VoipCheapSMS\VoipCheap;
        use \VoipCheapSMS\Message;
        
        $vc = new VoipCheap("voipcheap_user","voipcheap_password","voipcheap_from");
        echo $vc->send(Message::builder()->to("+prefix_destinationNumber")->text("This is the text of the sms!"));
        
NOTE: This project was a quick and dirty test for testing publishing packages to Packagist

#License
MIT
