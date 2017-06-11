<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if($_SERVER['HTTP_HOST'] =='localhost:8888'){
//local:
    $host='localhost';
    $dbname='sauce';
    $username='fred';
    $password='Luffy1';

} elseif($_SERVER['HTTP_HOST'] =='pbcs.us'){
   //remote
    $host='localhost';
    $dbname='falcanta_sauce';
    $username='falcanta_freddya';
    $password='Luffy1!';

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
            <div class="col-xs-12">
                <h1>Recipes <small>Saucenality</small></h1>
                <hr />
                <img class="img-responsive" src="img/recipe.jpg" alt="Sauces">
            </div>
        </div>
        <div class="row as">
            <div class="col-xs-12">
                <h1>Sauces</h1>
                <hr />
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <img class="img-responsive center-block" src="img/pestomin.jpg" alt="Pesto">
                    </div>
                    <div class="panel-body">
                        <h3 class="service-font text-center">Pesto</h3>
                        <p class="text-center">Pesto has a basil and salty taste to it, it's generally used in Italian dishes. You can use it on pasta, salmon, and mozzarella chicken.</p>
                        <a style= "color: #FFF; text-underline: none;" target="_blank" href="http://www.foodnetwork.com/recipes/food-network-kitchen/basil-pesto-recipe2">
                        <button type="button" class="btn btn-primary center-block">Learn More</button></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <img class="img-responsive center-block" src="img/soymin.jpg" alt="Soy Sauce">
                    </div>
                    <div class="panel-body">
                        <h3 class="service-font text-center">Soy Sauce</h3>
                        <p class="text-center">Soy Sauce is generally used as an Asian dish. It's usually used in teriyaki, california rolls, or in steak sauces.</p>
                        <a style= "color: #FFF; text-underline: none;" target="_blank" href="http://allrecipes.com/recipe/92873/soy-sauce-substitute/">
                        <button type="button" class="btn btn-primary center-block">Learn More</button></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <img class="img-responsive center-block" src="img/bbqmin.jpg" alt="BBQ">
                    </div>
                    <div class="panel-body">
                        <h3 class="service-font text-center">BBQ Sauce</h3>
                        <p class="text-center">BBQ Sauce is a standard condiment in American dishes. It is especially used in Ribs, without BBQ you are a very bland eater.</p>
                        <a style= "color: #FFF; text-underline: none;" target="_blank" href="http://allrecipes.com/recipe/51226/a-very-popular-bbq-sauce/">
                        <button type="button" class="btn btn-primary center-block">Learn More</button></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <img class="img-responsive center-block" src="img/guacmin.jpg" alt="Guacamole">
                    </div>
                    <div class="panel-body">
                        <h3 class="service-font text-center">Guacamole</h3>
                        <p class="text-center">The above and beyond sauce in Mexican Dishes. Guacamole is well known in Authentic Mexican restaurants. One make their sample of Mexican Guac in their kitchen.</p>
                        <a style= "color: #FFF; text-underline: none;" target="_blank" href="http://www.simplyrecipes.com/recipes/perfect_guacamole/"><button type="button" class="btn btn-primary center-block">Learn More</button></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row as">
            <h2>Ingredients</h2>
            <hr />
        </div>
        <div class="row">
            <!-- Nav tabs -->
            <div class="col-xs-12">
            <ul class="nav nav-tabs" role="tablist">
                <li active" role="presentation">
                    <a href="#pesto" aria-controls="pesto" role="tab" data-toggle="tab">Pesto</a>
                </li>
                <li  role="presentation">
                    <a href="#soy" aria-controls="soy" role="tab" data-toggle="tab">Soy Sauce</a>
                </li>
                <li  role="presentation">
                    <a href="#bbq" aria-controls="bbq" role="tab" data-toggle="tab">BBQ Sauce</a>
                </li>
                <li  role="presentation">
                    <a href="#guacamole" aria-controls="guacamole" role="tab" data-toggle="tab">Guacamole</a>
                </li>
            </ul>
            </div>
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="pesto">
                    <h3 class="tabs">Pesto</h3>
                    <ul>
                        <li>2 cups packed fresh basil leaves</li>
                        <li>2 cloves garlic</li>
                        <li>1/4 cup pine nuts</li>
                        <li>2/3 cup extra-virgin olive oil, divided</li>
                        <li>Kosher salt and freshly ground black pepper, to taste</li>
                        <li>1/2 cup freshly grated Pecorino cheese</li>
                    </ul>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="soy">
                    <h3 class="tabs">Soy Sauce</h3>
                    <ul>
                        <li>4 tablespoons beef bouillon</li> 
                        <li>4 teaspoons balsamic vinegar</li> 
                        <li>2 teaspoons dark molasses</li> 
                        <li>1/4 teaspoon ground ginger</li> 
                        <li>1 pinch white pepper</li> 
                        <li>1 pinch garlic powder</li> 
                        <li>1 1/2 cups water</li> 
                    </ul>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="bbq">
                    <h3 class="tabs">BBQ Sauce</h3>
                    <ul>
                        <li>1 1/2 cups brown sugar</li>
                        <li>1 1/2 cups ketchup</li>
                        <li>1/2 cup red wine vinegar</li> 
                        <li>1/2 cup water</li> 
                        <li>1 tablespoon Worcestershire sauce</li> 
                        <li>2 1/2 tablespoons dry mustard</li> 
                        <li>2 teaspoons paprika</li> 
                        <li>2 teaspoons salt</li> 
                        <li>1 1/2 teaspoons black pepper</li>
                    </ul>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="guacamole">
                    <h3 class="tabs">Guacamole</h3>
                    <ul>
                        <li>2 ripe avocados</li>
                        <li>1/2 teaspoon Kosher salt</li>
                        <li>1 Tbsp of fresh lime juice or lemon juice</li>
                        <li>2 Tbsp to 1/4 cup of minced red onion or thinly sliced green onion</li>
                        <li>1-2 serrano chiles, stems and seeds removed, minced</li>
                        <li>2 tablespoons cilantro (leaves and tender stems), finely chopped</li>
                        <li>A dash of freshly grated black pepper</li>
                        <li>1/2 ripe tomato, seeds and pulp removed, chopped</li>
                    </ul>
                </div>
            </div>
        </div>
        <footer class="row">
            <hr />
            <p></p>
            <p class="text">Copyright &copy; Saucenality <? echo date('Y'); ?></p>
        </footer>

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="main.js"></script>
</body>

</html>