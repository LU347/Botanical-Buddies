<?php

$db_host="partygoer.mysql.database.azure.com";        
$db_user="matthewmartinez";        //Change this
$db_pass="1qaz2wsx!QAZ@WSX";        //Change this
$db_name="herewego";     //Do not change

$db_conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if (!$db_conn) {
    die("Error: " . mysqli_connect_error());
}
else
{
    header("Location: index.html");
    // possible JS script method if Header doesn't work
    //<script type="text/javascript"> 
    //window.location.href="Index.html" 
    //</script> 
}


?>
