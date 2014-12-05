<?php
      //include "config.php";
      echo "<h2>Search Results:</h2><p>";

      if(isset($_POST['search']))
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
            $iname = mysql_query("SELECT * FROM missing WHERE firstname LIKE '%$find%'")
             or die(mysql_error());

            //And we display the results
            while($result = mysql_fetch_array( $iname ))
            {
                  echo "id :" .$result['id'];
                 /** echo "<br> ";
                  echo "firstname :".$result['firstname'];
                  echo "<br>";
                  echo "lastname :".$result['lastname'];
                  echo "<br>";
                  echo "age :".$result['age'];
                  echo "<br>";
                  echo "lost :".$result['lost'];
                  echo "<br>";**/
            }

            //This counts the number or results - and if there wasn't any it gives them a     little     message explaining that
            $anymatches = mysql_num_rows($iname);
            if ($anymatches == 0)
            {
                  echo "Sorry, but we can not find an entry to match your query...<br><br>";
            }

            //And we remind them what they searched for
            echo "<b>Searched For:</b> " .$find;
            //}
      }
?> 