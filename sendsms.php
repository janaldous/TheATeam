

<?php
    // Simple SMS send function
    function sendSMS($username, $password, $to, $message, $originator) {
        $URL = 'http://api.textmarketer.co.uk/gateway/'."?username=$username&password=$password&option=xml";
        $URL .= "&to=$to&message=".urlencode($message).'&orig='.urlencode($originator);
        $fp = fopen($URL, 'r');
        return fread($fp, 1024);
    }
    // Example of use
    $response = sendSMS('BWsGG7', 'JPhljH', '447715289680', 'wattup it actually works!!!', 'UNICEF');
    echo $response;?>