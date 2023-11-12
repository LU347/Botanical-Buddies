<?php

//storing database details in variables.
    $hostname = "localhost";
    $username = "lucile";
    $password = "h*/NrW[/Lx.JFb4M";
    $dbname = "test";

    //creating connection to database
    $con = mysqli_connect($hostname, $username, $password, $dbname);
    //checking if connection is working or not
    if(!$con)
    {
        die("Connection failed!" . mysqli_connect_error());
    }
    else 
    {
        echo "Successfully Connected! <br>";
    }
    $sql = "SELECT * FROM `plants` ORDER BY `plant_name` ASC";
    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_assoc($result);
        $img_url = $row["plant_image_url"];
        echo "name: " . $row["plant_name"];
        echo "<img src='{$img_url}'</img>";
    }
    else 
    {
        echo "0 results";
    }
    
?>