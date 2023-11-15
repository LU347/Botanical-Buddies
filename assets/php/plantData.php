<?php
// storing database details in variables.

$hostname = "localhost";
$username = "lucile";
$password = "h*/NrW[/Lx.JFb4M";
$dbname = "botanical_buddies";

/*
$hostname = "partygoer.mysql.database.azure.com";
$username = "matthewmartinez";
$password = "1qaz2wsx!QAZ@WSX";
$dbname = "herewego";*/

// creating connection to the database
$con = mysqli_connect($hostname, $username, $password, $dbname);

// checking if connection is working or not
if (!$con) {
    die("Connection failed!" . mysqli_connect_error());
}

if (isset($_POST['addToCart'])) {
    $plantName = $_POST['addToCart'];
    $sql = "UPDATE `plants` SET `plant_quantity` = `plant_quantity` + 1 WHERE `plant_name` = '$plantName'";
    $result = mysqli_query($con, $sql);

    if (!$result) {
        echo "error handling addtocart";
    }
    echo "Successfully added to cart!";
} 

if (isset($_POST['itemName'])) {
    $itemName = $_POST['itemName'];
    $result = '';
    switch($itemName) {
        case 'Home':
            $sql = "SELECT * FROM `plants` LIMIT 10"; //temporary
            break;
        case 'All':
            $sql = "SELECT * FROM `plants` ORDER BY `plant_name`";
            break;
        case 'Flower':
            $sql = "SELECT * FROM `plants` WHERE `plant_type` = 'Flower'";
            break;
        case 'Tree':
            $sql = "SELECT * FROM `plants` WHERE `plant_type` = 'Tree'";
            break;
        case 'Shrub':
            $sql = "SELECT * FROM `plants` WHERE `plant_type` = 'Shrub'";
            break;
    }
    $result = mysqli_query($con, $sql);
}

                
if (mysqli_num_rows($result) > 0) {
    $data = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $img_url = $row["plant_image_url"];
        $data[] = array(
            'name' => $row['plant_name'],
            'type' => $row['plant_type'],
            'desc' => $row['plant_description'],
            'imgURL' => $img_url,
            'price' => $row['plant_price'],
            'quantity' => $row['plant_quantity'],
            'quantityAvailable' => $row['plant_quantity_available'],
        );
    }

    $json = json_encode($data);
    header('Content-Type: application/json');
    echo $json;

} else {
    echo json_encode(["error" => "No results"]);
}

?>
