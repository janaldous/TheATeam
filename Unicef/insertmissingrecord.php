<?php

//receive information sent by post method
$firstname = $_POST[firstname];
$lastname = $_POST[lastname];
$gender = $_POST[gender];
$age = $_POST[age];
$height = $_POST[height];
$distinguishingfeatures = $_POST[distinguishingfeatures];
$mothername = $_POST[mothername];
$fathername = $_POST[fathername];

$lastseenplace = $_POST[lastseenplace];
$lastseentime = $_POST[lastseentime];
$lost = $_POST[lost];

//connect to MySQL
$servername = "db4free.net";
$username = "ateam";
$password = "shubham";
$sql = mysql_connect($servername,$username,$password);
mysql_connect($servername,$username,$password);

//select database
mysql_select_db("unification");

//insert values
$insert_query = "INSERT INTO missing (firstname, lastname, age, gender, height, distinguishingfeatures, mothername, fathername, lastseenplace, lastseentime, lost) VALUES ('$firstname', '$lastname', '$age', '$gender', '$height', '$distinguishingfeatures', '$mothername', '$fathername', '$lastseenplace', '$lastseentime', '$lost')";
mysql_query($insert_query);

//close MySQL
mysql_close($sql);

?>