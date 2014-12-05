<?php


$connection = mysql_connect('db4free.net', 'ateam', 'shubham'); //The Blank string is the password
mysql_select_db('unification');

$query = "SELECT * FROM missing"; //You don't need a ; like you do in SQL
$result = mysql_query($query);

echo "<table border = 1>"; // start a table tag in the HTML
echo "<tr><th>First name</th><th>Last name</th><th>Last seen (Place)</th><th>Last seen (Time)</th><th>Gender</th><th>Age</th><th>Height</th><th>Distinguishing Features</th></tr>"

while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
if($row['lost']==1) {
	echo "<tr><td>" . $row['firstname'] . "</td>"
	."<td>" . $row['lastname'] . "</td>"
	."<td>" . $row['lastseenplace'] . "</td>"
	."<td>" . $row['lastseentime'] . "</td>"
	."<td>" . $row['gender'] . "</td>"
	."<td>" . $row['age'] . "</td>"
	."<td>" . $row['height'] . "</td>"
	."<td>" . $row['distinguishingfeatures'] . "</td>"
	."</tr>";  //$row['index'] the index here is a field name
}
}

echo "</table>"; //Close the table in HTML

mysql_close(); //Make sure to close out the database connection

?>