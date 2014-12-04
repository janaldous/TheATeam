<?php
$dbhost = 'db4free.net';
$dbuser = 'ateam';
$dbpass = 'shubham';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
$sql = 'SELECT firstname, lastname, age, gender, mothername, fathername, height, distinguishingfeatures, lastseenplace, lastseentime FROM missing';

mysql_select_db('unification');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}
while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
{
    echo "firstname :{$row['firstname']}  <br> ".
         "lastname : {$row['lastname']} <br> ".
         "age : {$row['age']} <br> ".
         "gender : {$row['gender']} <br> ".
         "mothername : {$row['mothername']} <br> ".
         "fathername : {$row['fathername']} <br> ".
         "height : {$row['height']} <br> ".
         "distinguishingfeatures : {$row['distinguishingfeatures']} <br> ".
         "lastseenplace : {$row['lastseenplace']} <br> ".
         "lastseentime : {$row['lastseentime']} <br> ".
         
         "--------------------------------<br>";
} 
echo "Fetched data successfully\n";
mysql_close($conn);
?>