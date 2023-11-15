<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Botanical Buddies</title>
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
            <div>
            <link href='https://fonts.googleapis.com/css?family=Lato:300,400|Montserrat:700' rel='stylesheet' type='text/css'>
	<style>
		@import url(//cdnjs.cloudflare.com/ajax/libs/normalize/3.0.1/normalize.min.css);
		@import url(//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css);
	</style>
	<link rel="stylesheet" href="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/default_thank_you.css">
	<script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/jquery-1.9.1.min.js"></script>
	<script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/html5shiv.js"></script>
</head>
<body>
	<header class="site-header" id="header">
		<h1 class="site-header__title" data-lead-id="site-header-title">THANK YOU!</h1>
	</header>

	<div class="main-content">
		<i class="fa fa-check main-content__checkmark" id="checkmark"></i>
		<p class="main-content__body" data-lead-id="main-content-body">
            Thank you for your order! We'll get everything packaged and sent to you in no time!</p>
            <a href="index.html">Click here to continue Shopping</a>
	</div>
            </div>
            <div id="container" class="carousel"></div>
        </main>
    </body>
</html>
<?php

echo '<script type="text/javascript" src="cartScript.js"></script>';
    $server = "localhost";
    $user = "root";
    $port = 3307;
    $password = "";
    $db = "plants";
    $pdo = new PDO("mysql:host=$server;port=$port;dbname=$db", $user, $password);
    echo $_COOKIE["price"]; 
    echo "   ";
    echo $_COOKIE["items"]; 

    $sql = "UPDATE plant SET plant_quantity_available = (plant_quantity_available - plant_quantity)";
    $statement = $pdo->prepare($sql);
    $statement->execute();  

    $sql = "INSERT INTO orderhistory (num_items, order_price, order_date)
    VALUES  ($_COOKIE[items], $_COOKIE[price], now())";
    $statement = $pdo->prepare($sql);
    $statement->execute();
     

     $sql = "UPDATE plant SET plant_quantity = 0";
     $statement = $pdo->prepare($sql);
     $statement->execute();    
    ?>
    