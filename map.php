<?php
 mysql_connect("localhost", "tompublic", "public") or die(mysql_error()); 
 mysql_select_db("first_section") or die(mysql_error()); 

$data = mysql_query("SELECT geo_lat, geo_lon FROM first_page_data")
or die(mysql_error());
while ($row = mysql_fetch_assoc($data)){
$lat[] = $row['geo_lat'];
$lon[] = $row['geo_lon'];
}
?>