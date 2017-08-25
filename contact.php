<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if($_SERVER['HTTP_HOST'] =='host'){
//local:
    $host='host';
    $dbname='db';
    $username='username';
    $password='password';

} elseif($_SERVER['HTTP_HOST'] =='host'){
   //remote
    $host='host';
    $dbname='db';
    $username='username';
    $password='password!';

}else{
    echo "unknown host: " . $_SERVER['HTTP_HOST'];
}    


$db = new PDO( "mysql:host=$host;dbname=$dbname", $username, $password );
// Perform the query:


$sum = "SELECT SUM( cart ) AS c FROM cart";
$rows = $db -> query($sum);
    
$result = $db->query("Select inventory.sku, inventory.title, inventory.price, inventory.description, inventory.img, cart.cart FROM cart LEFT JOIN inventory on cart.sku = inventory.sku");

 while ( $row = $rows->fetch( PDO::FETCH_ASSOC ) ) {
    $c = $row['c'];
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Saucenality</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#pp">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Saucenality</a>
            </div>
            <div class="collapse navbar-collapse navbar-right" id="pp">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="recipe.php">Recipes</a></li>
                    <li><a href="store.php">Store</a></li>
                    <li><a href="cart.php">Cart <span class="glyphicon glyphicon-shopping-cart">(<?= $c ?>)</span></a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>



    <div class="container">
        <div class="row as">
            <h1>Contact <small>Saucenality</small></h1>
            <hr />
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-4 col-md-push-8">
                <h3 class="details">Contact Details</h3>
                <address>
                    561 Sauce Drive <br />
                    Jupiter, FL 33458
                </address>
                <p><span class="glyphicon glyphicon-phone"></span>&nbsp; (561) 310-9664</p>
                <p><span class="glyphicon glyphicon-envelope"></span> <a href="mailto:frederickaalcantara@gmail.com?Subject=Sauce%20Inquiry" target="_top"> &nbsp;frederickaalcantara@gmail.com</a></p>
                <p><span class="glyphicon glyphicon-time"></span>&nbsp; Monday - Sunday 9:00 AM to 10:00 PM</p>
            </div>
            <div class="col-sm-12 col-md-8 col-md-pull-4">
                <h3>Send us a Message</h3> <br />
                
<form id="contact-form" method="post" action="contact.php" role="form">

    <div class="messages"></div>

    <div class="controls">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_name">First Name *</label>
                    <input id="form_name" type="text" name="fname" class="form-control" placeholder="Please enter your first name *" required="required" data-error="First name is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_lastname">Last Name *</label>
                    <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Please enter your last name *" required="required" data-error="Last name is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_email">Email *</label>
                    <input id="form_email" type="email" name="email" class="form-control" placeholder="Please enter your email *" required="required" data-error="Valid email is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_phone">Phone</label>
                    <input id="form_phone" type="tel" name="phone" class="form-control" placeholder="Please enter your phone">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="form_message">Message *</label>
                    <textarea id="form_message" name="message" class="form-control" placeholder="Message for me about the sauce*" rows="4" required="required" data-error="Please,leave us a message."></textarea>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-12">
                <input type="submit" class="btn btn-primary btn-send" value="Send message">
            </div>
        </div>
    </div>

</form>
            </div>
        </div>
        <footer class="row">
            <hr />
            <p></p>
            <p class="text">Copyright &copy; Saucenality <? echo date('Y'); ?></p>
        </footer>
    </div>
    
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="js/validator.js"></script>
    <script src="js/contact.js"></script>
    <script src="js/main.js"></script>
</body>

</html>

