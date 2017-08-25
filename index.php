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
    <header id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="list-box">
            <div class="item active">
                <div class="fill" style="background-image:url('img/chimmi.jpg');"></div>
                <div class="carousel-caption">
                    <h2>Chimichurri Sauce</h2>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('img/soy.jpg');"></div>
                <div class="carousel-caption">
                    <h2>Soy &amp; Duck sauce</h2>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('img/marinara.jpg');"></div>
                <div class="carousel-caption">
                    <h2>Marinara Sauce</h2>
                </div>
            </div>
        </div>
        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="bottom">Saucenality</h1>
                <p class="slogan">One who has no sauce is lost, but one can be lost in the sauce.</p>
                <hr />

            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Recipes
                    </div>
                    <div class="panel-body">
                        <p class="text-center">Here are some scrumptious recipes that use some of our sauces. Our sauces will complement these recipes. </p>
                        <br />
                        <img class="img-responsive center-block" src="img/ribs.jpg" alt="Ribs">
                        <br />
                        <a href="recipe.php"><button class="btn btn-primary center-block">Learn More</button></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Expansive Selection
                    </div>
                    <div class="panel-body">
                        <p class="text-center">We have a large variety of sauces. We sell anything from soy sauce, to pesto, to cheese sauce.</p>
                        <br />
                        <img class="img-responsive center-block" src="img/sauce.jpg" alt="Sauces">
                        <br />
                        <a href="store.php"><button class="btn btn-primary center-block">Learn More</button></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Delicious Sauces
                    </div>
                    <div class="panel-body">
                        <p class="text-center">Our sauces are so delicious that we will take your taste buds for a ride and blow them away, we make our sauces from scratch. Contact us if you want to learn more.</p>
                        <br />
                        <img class="img-responsive center-block" src="img/alfredo.jpg" alt="Alfredo sauce ingredients">
                        <br />
                        <a href="contact.php"><button class="btn btn-primary center-block">Learn More</button></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h2 class="bottom">Select Sauces</h2>
                <hr />
            </div>
        </div>
        <div class="row pictures">
            <div class="col-md-4 col-sm-4 col-xs-12">
                <img class="img-responsive pics center-block" src="img/guacamole.jpg" alt="Guac">
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <img class="img-responsive pics center-block" src="img/bbq.jpg" alt="BBQ">
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <img class="img-responsive pics center-block" src="img/caramel.jpg" alt="Caramel">
            </div>
        </div>
        <div class="row pictures">
            <div class="col-md-4 col-sm-4 col-xs-12">
                <img class="img-responsive pics center-block" src="img/pesto.jpg" alt="Pesto">
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <img class="img-responsive pics center-block" src="img/chocolate.jpg" alt="Chocolate">
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <img class="img-responsive pics center-block" src="img/cheese-sauce.jpg" alt="Cheese Sauce">
            </div>
        </div>
        <div class="row">
        	<footer class="col-xs-12">
        	<hr />
        	<p></p>
        	<p class="text">Copyright &copy; Saucenality <? echo date('Y'); ?></p>
			</footer>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="main.js"></script>
</body>

</html>
