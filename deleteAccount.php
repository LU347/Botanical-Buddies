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
$sql = " SELECT * FROM login";
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
    <h1>User Accounts</h1>
            <header>
            <nav>
            <a href="admin.html">Administrative Home Page</a>
            <a href="deleteAccount.php">Delete Accounts</a>
            <a href="deleteInventory.php">Delete Inventory</a>
            <a href="orderHistory.php">Order History</a>
            <a href="logout.php">Logout</a>
        </nav>
        </header>
      <div class="container">
        <section>
           
            <!-- TABLE CONSTRUCTION -->
            <table>
                <tr>
                    <th>User Name</th>
                    
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
                    <td><?php echo $rows['USERNAME'];?></td>
                    
                </tr>
                <?php
                    }
                ?>
            </table>
        </section>
        <section>
        <br>
                        <form action="delete.php" method="post">
                        Delete: <input type="text" name="email" id="email"/></label></td>
                        <input type="submit" value="Delete"/>
                        </tr>
                        </form>
        </section>
        </div>
    </body>
</html>
