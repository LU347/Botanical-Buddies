<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Records</title>
    <script type="text/javascript">
        function jsFunction(name, y){
          setCookie(name, y , 10); 
        }
        function setCookie(cName, cValue, expDays) {
    let date = new Date();
    date.setTime(date.getTime() + (expDays * 24 * 60 * 60 * 1000));
    const expires = "expires=" + date.toUTCString();
    document.cookie = cName + "=" + cValue + "; " + expires + "; path=/";
}

</script>
    <style>
        table{
            width: 70%;
            margin: auto;
            font-family: Arial, Helvetica, sans-serif;
        }
        table, tr, th, td{
            border: 1px solid #d4d4d4;
            border-collapse: collapse;
            padding: 12px;
        }
        th, td{
            text-align: left;
            vertical-align: top;
        }
        tr:nth-child(even){
            background-color: #e7e9eb;
        }
        @import url('https://fonts.googleapis.com/css2?family=Gabarito&display=swap');

* {
    font-family: "Gabarito";
    font-weight: 400;
    font-size: 16px;
    scroll-behavior: smooth !important;
    scroll-padding-top: 120px;
    margin: 0;
    padding: 0;
}

header {
    display: flex;
}

body {
    color: black;
    background-color: white;
    min-height: 100vh;
}

nav {
    background-color: white;
    box-shadow: 5px 5px 5px rgba(0,0,0,0.1);
    width: 100%;
}

nav ul {
    width: 100%;
    list-style: none;
    display: flex;
    justify-content: flex-start;
    align-items: center;
}

nav li {
    height: 50px;
    width: 100%;
    padding: 0 5px;
}

nav a {
    height: 100%;
    padding: 0 30px;
    display: flex;
    align-items: center;
    text-decoration: none;
    color: black;
}

nav li:first-child li:nth-child(2){
    margin-right: auto;
}

.sidebar {
    position: fixed;
    background-color: rgb(182, 199, 186);
    top: 0;
    right: 0;
    height: 100%;
    width: 250px;
    z-index: 0;
    display: none;
    flex-direction: column;
    align-items: flex-start;
    justify-content: flex-start;
}

.sidebar li {
    width: 100%;
}

.sidebar a {
    width: 100%;
}

.menuButton {
    display: none;
}

@media(max-width: 600px)
{
    .hideOnMobile {
        display: none;
    }

    .menuButton {
        display: block;
    }
}

@media(max-width: 400px)
{
    .sidebar {
        width:100%;
    }
}

button {
    padding: 9px 25px;
    background-color:rgb(171, 224, 184);
    border:none;
    border-radius:50px;
    transition: all 0.3s ease 0s;
    cursor: pointer;
    }
    img,
    .basket-module,
    .basket-labels,
    .basket-product {
    width: 100%;
    }

    input,
    button,
    .basket,
    .basket-module,
    .basket-labels,
    .item,
    .price,
    .quantity,
    .subtotal,
    .basket-product,
    .product-image,
    .product-details {
    float: left;
    }
    .basket {
    width: 70%;
    }
    .basket-labels {
    border-top: 1px solid #ccc;
    border-bottom: 1px solid #ccc;
    margin-top: 1.625rem;
    }
    .basket-product {
  border-bottom: 1px solid #ccc;
  padding: 1rem 0;
  position: relative;
}

.product-image {
  width: 35%;
}

.product-details {
  width: 65%;
}

.product-frame {
  border: 1px solid #aaa;
}

.product-details {
  padding: 0 1.5rem;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

.quantity-field {
  background-color: #ccc;
  border: 1px solid #aaa;
  border-radius: 4px;
  font-size: 0.625rem;
  padding: 2px;
  width: 3.75rem;
}

aside {
  float: right;
  position: relative;
  width: 30%;
}

.summary {
  background-color: #eee;
  border: 1px solid #aaa;
  padding: 1rem;
  position: fixed;
  width: 250px;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

/*test*/


html,
html a {
  -webkit-font-smoothing: antialiased;
  text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.004);
}

body {
  background-color: #fff;
  color: #666;
  font-family: 'Open Sans', sans-serif;
  font-size: 62.5%;
  margin: 0 auto;
}

a {
  border: 0 none;
  outline: 0;
  text-decoration: none;
}

strong {
  font-weight: bold;
}

p {
  margin: 0.75rem 0 0;
}

h1 {
  font-size: 0.75rem;
  font-weight: normal;
  margin: 0;
  padding: 0;
}

input,
button {
  border: 0 none;
  outline: 0 none;
}


button:hover,
button:focus {
  background-color: #555;
}

img,
.basket-module,
.basket-labels,
.basket-product {
  width: 100%;
}

input,
button,
.basket,
.basket-module,
.basket-labels,
.item,
.price,
.quantity,
.subtotal,
.basket-product,
.product-image,
.product-details {
  float: left;
}

.price:before,
.subtotal:before,
.subtotal-value:before,
.total-value:before,
.promo-value:before {
  content: '$';
}

.hide {
  display: none;
}

main {
  clear: both;
  font-size: 0.75rem;
  margin: 0 auto;
  overflow: hidden;
  padding: 1rem 0;
  width: 960px;
}

.basket,
aside {
  padding: 0 1rem;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

.basket {
  width: 70%;
}

.basket-module {
  color: #111;
  margin-top: 1.625rem;
}

label {
  display: block;
  margin-bottom: 0.3125rem;
}

.promo-code-field {
  border: 1px solid #ccc;
  padding: 0.5rem;
  text-transform: uppercase;
  transition: all 0.2s linear;
  width: 48%;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
  -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
  -o-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
}

.promo-code-field:hover,
.promo-code-field:focus {
  border: 1px solid #999;
}

.promo-code-cta {
  border-radius: 4px;
  font-size: 0.625rem;
  margin-left: 0.625rem;
  padding: 0.6875rem 1.25rem 0.625rem;
}

.basket-labels {
  border-top: 1px solid #ccc;
  border-bottom: 1px solid #ccc;
  margin-top: 1.625rem;
}

ul {
  list-style: none;
  margin: 0;
  padding: 0;
}

li {
  color: #111;
  display: inline-block;
  padding: 0.625rem 0;
}

li.price:before,
li.subtotal:before {
  content: '';
}

.item {
  width: 55%;
}

.price,
.quantity,
.subtotal {
  width: 15%;
}

.subtotal {
  text-align: right;
}

.remove {
  bottom: 1.125rem;
  float: right;
  position: absolute;
  right: 0;
  text-align: right;
  width: 45%;
}

.remove button {
  background-color: transparent;
  color: #777;
  float: none;
  text-decoration: underline;
  text-transform: uppercase;
}

.item-heading {
  padding-left: 4.375rem;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

.basket-product {
  border-bottom: 1px solid #ccc;
  padding: 1rem 0;
  position: relative;
}

.product-image {
  width: 35%;
}

.product-details {
  width: 65%;
}

.product-frame {
  border: 1px solid #aaa;
}

.product-details {
  padding: 0 1.5rem;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

.quantity-field {
  background-color: #ccc;
  border: 1px solid #aaa;
  border-radius: 4px;
  font-size: 0.625rem;
  padding: 2px;
  width: 3.75rem;
}

aside {
  float: right;
  position: relative;
  width: 30%;
}

.summary {
  background-color: #eee;
  border: 1px solid #aaa;
  padding: 1rem;
  position: fixed;
  width: 250px;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

.summary-total-items {
  color: #666;
  font-size: 0.875rem;
  text-align: center;
}

.summary-subtotal,
.summary-total {
  border-top: 1px solid #ccc;
  border-bottom: 1px solid #ccc;
  clear: both;
  margin: 1rem 0;
  overflow: hidden;
  padding: 0.5rem 0;
}

.subtotal-title,
.subtotal-value,
.total-title,
.total-value,
.promo-title,
.promo-value {
  color: #111;
  float: left;
  width: 50%;
}

.summary-promo {
  -webkit-transition: all .3s ease;
  -moz-transition: all .3s ease;
  -o-transition: all .3s ease;
  transition: all .3s ease;
}

.promo-title {
  float: left;
  width: 70%;
}

.promo-value {
  color: #8B0000;
  float: left;
  text-align: right;
  width: 30%;
}

.summary-delivery {
  padding-bottom: 3rem;
}

.subtotal-value,
.total-value {
  text-align: right;
}

.total-title {
  font-weight: bold;
  text-transform: uppercase;
}

.summary-checkout {
  display: block;
}

.checkout-cta {
  display: block;
  float: none;
  font-size: 0.75rem;
  text-align: center;
  text-transform: uppercase;
  padding: 0.625rem 0;
  width: 100%;
}

.summary-delivery-selection {
  background-color: #ccc;
  border: 1px solid #aaa;
  border-radius: 4px;
  display: block;
  font-size: 0.625rem;
  height: 34px;
  width: 100%;
}

@media screen and (max-width: 640px) {
  aside,
  .basket,
  .summary,
  .item,
  .remove {
    width: 100%;
  }
  .basket-labels {
    display: none;
  }
  .basket-module {
    margin-bottom: 1rem;
  }
  .item {
    margin-bottom: 1rem;
  }
  .product-image {
    width: 40%;
  }
  .product-details {
    width: 60%;
  }
  .price,
  .subtotal {
    width: 33%;
  }
  .quantity {
    text-align: center;
    width: 34%;
  }
  .quantity-field {
    float: none;
  }
  .remove {
    bottom: 0;
    text-align: left;
    margin-top: 0.75rem;
    position: relative;
  }
  .remove button {
    padding: 0;
  }
  .summary {
    margin-top: 1.25rem;
    position: relative;
  }
}

@media screen and (min-width: 641px) and (max-width: 960px) {
  aside {
    padding: 0 1rem 0 0;
  }
  .summary {
    width: 28%;
  }
}

@media screen and (max-width: 960px) {
  main {
    width: 100%;
  }
  .product-details {
    padding: 0 1rem;
  }
}


    </style>
<body>
      
<?php

echo '<script type="text/javascript" src="cartScript.js"></script>';


    //storing database details in variables.
    

    $server = "localhost";
    $user = "root";
    $port = 3307;
    $password = "";
    $db = "plants";
    $pdo = new PDO("mysql:host=$server;port=$port;dbname=$db", $user, $password);

    $subtotal = 0.00;
    $totalitems = 0;
    
    $sql = 'SELECT plant_name, plant_image_url, plant_quantity, plant_price, plant_type, plant_description FROM plant WHERE plant_quantity >= 1';
  
    $statement = $pdo->query($sql);
    $plants = $statement->fetchAll(PDO::FETCH_ASSOC);
    echo'<main>
    <div class="basket">

                <div class="basket-labels">
                    <ul>
                    <li class="item item-heading">Item</li>
                    <li class="price">Price</li>
                    <li class="quantity">Quantity</li>
                    <li class="subtotal">Subtotal</li>
                    </ul>
                </div>
            ';
    
    foreach ($plants as $plant) {
        $totalprice = $plant['plant_price'] * $plant['plant_quantity'] ;
        $subtotal += (float) $totalprice;
        $totalitems += $plant['plant_quantity'];
        echo ' <div class="basket-product" id="demo">
        <div class="item">
          <div class="product-image">
            <img src=' . $plant["plant_image_url"] .' alt="Placholder Image 2" class="product-frame">
          </div>
          <div class="product-details">
            <h1><strong><span class="item-quantity">'. $plant["plant_quantity"] .'</span> ' . $plant["plant_name"] . '</strong></h1>
            <p><strong>' . $plant["plant_description"] . '</strong></p>
          </div>
        </div>
        <div class="price">' . $plant["plant_price"] . '</div>
        <div class="quantity">
          <input type="number" value=' . $plant["plant_quantity"] . ' min="1" class="quantity-field">
        </div>
        <div class="subtotal">' . $totalprice . '</div>
        
      </div>';
            
    }
    $taxPercent = 8.25 / 100;
    $salesTax = number_format((float)$subtotal * $taxPercent, 1, '.', '');
    $cartTotal = number_format((float)$subtotal + $salesTax, 2, '.', '');
    echo ' <div class="basket-module">
                <label for="promo-code">Enter a promotional code</label>
                <input id="promo-code" type="text" name="promo-code" maxlength="5" class="promo-code-field">
                <button onClick="discount()" class="promo-code-cta">Apply</button>
            </div>
            </div>';
$checkout = "'checkout.php'";
    echo '<aside>
    <div class="summary">
      <div class="summary-total-items"><span class="total-items"></span> '. $totalitems .' Items in your Bag</div>
      <div class="summary-subtotal">
        <div class="subtotal-title">Subtotal</div>
        <div class="subtotal-value final-value" id="basket-subtotal">' . $subtotal . '</div>
        <div class="summary-promo">
          <div class="promo-title">Promotion</div>
          <div class="promo-value final-value" id="basket-promo">0</div>
        </div>
        <div class="summary-promo">
          <div class="promo-title">Taxes</div>
          <div class="promo-value final-value" id="taxes">' . $salesTax . '</div>
        </div>
      </div>
      <div class="summary-total">
        <div class="total-title">Total</div>
        <div class="total-value final-value" id="basket-total">' . $cartTotal .'</div>
      </div>
      <div class="summary-checkout">
        <button  onclick="window.location.href='.$checkout.';" class="checkout-cta">Go to Secure Checkout</button>
      </div>
    </div>
  </aside>';
    echo '</main>';
    echo '<script type="text/javascript">jsFunction("price", '. $cartTotal .');</script>';
    echo '<script type="text/javascript">jsFunction("items", '. $totalitems .');</script>';
    echo $_COOKIE["price"];
    

?>



</body>
</html>
