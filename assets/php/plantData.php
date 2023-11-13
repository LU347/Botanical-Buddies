<?php
// storing database details in variables.
$hostname = "localhost";
$username = "lucile";
$password = "h*/NrW[/Lx.JFb4M";
$dbname = "botanical_buddies";

// creating connection to the database
$con = mysqli_connect($hostname, $username, $password, $dbname);

// checking if connection is working or not
if (!$con) {
    die("Connection failed!" . mysqli_connect_error());
}

switch(true) {
    case isset($_POST["All"]):
        $sql = "SELECT * FROM `plants` ORDER BY `plant_name` ASC";
        break;
    case isset($_POST["Flower"]):
        $sql = "SELECT * FROM `plants` WHERE `plant_type` = 'Flower' ORDER BY `plant_price` ASC";
        break;
    case isset($_POST["Tree"]):
        $sql = "SELECT * FROM `plants` WHERE `plant_type` = 'Tree' ORDER BY `plant_price` ASC";
        break;
    case isset($_POST["Shrub"]):
        $sql = "SELECT * FROM `plants` WHERE `plant_type` = 'Shrub' ORDER BY `plant_price` ASC";
        break;
}

$sql = "SELECT * FROM `plants` WHERE `plant_type` = 'Tree' ORDER BY `plant_price` ASC";
$result = mysqli_query($con, $sql);
                
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
