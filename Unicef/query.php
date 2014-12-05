<?php
      //include "config.php";
      $host="db4free.net"; // Host name 
      $username="ateam"; // Mysql username 
      $password="shubham"; // Mysql password 
      $db_name="unification"; // Database name 
      //$tbl_name="login"; // Table name 

      // Connect to server and select databse.
      mysql_connect("$host", "$username", "$password")or ("cannot connect"); 
      mysql_select_db("$db_name")or die("cannot select DB");
      
      echo "<h2>Search Results:</h2><p>";

      if(isset($_POST['firstname']))
      {     
            $find =$_POST['firstname'];
            //$lastname =$_POST['lastname'];
            //If they did not enter a search term we give them an error
            if ($find == "" ) //|| $lastname = "")
            {
                  echo "<p>You forgot to enter a search term!!!";
                  exit;
            }

            // Otherwise we connect to our Database


            // We perform a bit of filtering
            $find = strtoupper($find);
            $find = strip_tags($find);
            $find = trim ($find);

            //Now we search for our search term, in the field the user specified
            $sql = mysql_query("SELECT * FROM missing WHERE firstname LIKE '%$find%'")
            or die(mysql_error());
            //echo $sql;


            echo "<table style=\"width:100%\" border=\"1\">";
            echo "<tr><th>id</th>";
                  echo "<th>firstname</th>";
                  echo "<th>lastname </th>";
                  echo "<th>age</th>";
                  echo "<th>lost</th>";
                  echo "<th>check if found</th>";
                  echo "</tr>";
            //And we display the results
            while($result = mysql_fetch_array( $sql ))
            {
                  echo "<tr><td>".$result['id'] . "</td>";
                  echo "<td>".$result['firstname']. "</td>";
                  echo "<td>".$result['lastname']."</td>";
                  echo "<td>".$result['age']."</td>";
                  echo "<td>".$result['lost']."</td>";
                  $val = $result['id'];
                  echo "<td><input type=\"radio\" name=\"thisone\" value=$val></td>";
                  echo "</tr>";
            }
            echo "</table>";
            //This counts the number or results - and if there wasn't any it gives them a     little     message explaining that
            $anymatches = mysql_num_rows($sql);
            echo $anymatches;

            if ($anymatches == 0)
            {
                  echo "Sorry, but we can not find an entry to match your query...<br><br>";
            }

            //And we remind them what they searched for
            echo "<b>Searched For:</b> " .$find;
            //}
      }
?> 

<html>
      <body>
            <form id="form1" name="form1" method="post" action="sendmessage.php">
                  <input type="submit" name="submit" id="submit" value="Submit">
            </form>
      </body>
<html>