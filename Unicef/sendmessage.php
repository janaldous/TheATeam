<?php
	$host="db4free.net"; // Host name 
  $username="ateam"; // Mysql username 
  $password="shubham"; // Mysql password 
  $db_name="unification"; // Database name 
  //$tbl_name="login"; // Table name 

  $find =$_POST['id'];
  echo $find;

  // Connect to server and select databse.
// Create connection
$conn = new mysqli($host, $username, $password, $db_name);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "UPDATE missing SET lost=0 WHERE id=$find";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

	function sendSMS($username, $password, $to, $message, $originator) {
        $URL = 'http://api.textmarketer.co.uk/gateway/'."?username=$username&password=$password&option=xml";
        $URL .= "&to=$to&message=".urlencode($message).'&orig='.urlencode($originator);
        $fp = fopen($URL, 'r');
        return fread($fp, 1024);
    }



    $smstext = mysql_fetch_array("SELECT contact, firstname, lastname, lastseenplace, lastseentime FROM missing WHERE id=$find");
    $message = "Greetings! Your child, ".$smstext['firstname']." ".$smstext['lastname']." has been found! Last seen at ".$smstext['lastseenplace']." on ".$smstext['lastseentime'].". Please apporach a UNICEF volunteer to meet your child.";

    echo $message;
    //$response = sendSMS('BWsGG7', 'JPhljH', $contact, 'wattup it actually works!!!', 'UNICEF');
    //echo $response;

    $conn->close();
?>