<?php



$connection = mysql_connect('db4free.net', 'ateam', 'shubham'); //The Blank string is the password
mysql_select_db('unification');

$query = "SELECT * FROM missing"; //You don't need a ; like you do in SQL
$result = mysql_query($query);

echo "<table>"; // start a table tag in the HTML

while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
echo "<tr><td>" . $row['firstname'] . "</td><td>" . $row['lastname'] . "</td></tr>";  //$row['index'] the index here is a field name
}

echo "</table>"; //Close the table in HTML

mysql_close(); //Make sure to close out the database connection


?>