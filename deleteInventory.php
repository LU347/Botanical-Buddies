<!-- PHP code to establish connection with the localserver -->
<?php
 
$db_host="partygoer.mysql.database.azure.com";        //Change this
$db_user="matthewmartinez";        //Change this
$db_pass="1qaz2wsx!QAZ@WSX";        //Change this
$db_name="herewego";     //Do not change

$mysqli = new mysqli("$db_host", "$db_user", "$db_pass", "$db_name");
 
// Checking for connections
if ($mysqli->connect_error) {
    die('Connect Error (' .
    $mysqli->connect_errno . ') '.
    $mysqli->connect_error);
}
 
// SQL query to select data from database
$sql = " SELECT * FROM plant_data ORDER BY plant_name DESC ";
$result = $mysqli->query($sql);
$mysqli->close();
?>
<html>
    <head>
        <title>Administrator</title>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="assets/js/admin.js"></script>
        <link rel="stylesheet" href="admin.css">
    </head>
   
    <body>
    <h1>Plant Inventory Sheet</h1>
            <header>
        <nav>
                <a href="admin.html">Admin Home Page</a>
                <a href="logout.php">Logout</a>
                <a href="deleteAccount.html">Delete Account</a>
                <a href="deleteInventory.php">Delete Inventory Items</a>
        </nav>
        </header>
      <div class="container">
        <section>
           
            <!-- TABLE CONSTRUCTION -->
            <table>
                <tr>
                    <th>Plant Name</th>
                    <th>Plant Description</th>
                    <th>Plant Price</th>
                    
                </tr>
                <!-- PHP CODE TO FETCH DATA FROM ROWS -->
                <?php 
                    // LOOP TILL END OF DATA
                    while($rows=$result->fetch_assoc())
                    {
                ?>
                <tr>
                    <!-- FETCHING DATA FROM EACH
                        ROW OF EVERY COLUMN -->
                    <td><?php echo $rows['plant_name'];?></td>
                    <td><?php echo $rows['plant_description'];?></td>
                    <td><?php echo $rows['plant_price'];?></td>
                    
                </tr>
                <?php
                    }
                ?>
            </table>
        </section>
        <section>
        <br>
                        <form action="deleteInv.php" method="post">
                        Delete: <input type="text" name="name" id="name"/></label></td>
                        <input type="submit" value="Delete"/>
                        </tr>
                        </form>
        </section>
        </div>
    </body>
</html>