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

if(isset($_REQUEST['qty'])) {
            $qty = $_REQUEST['qty'];
            if ( isset( $_REQUEST[ 'sku' ] ) ) {
                $sku1 = $_REQUEST[ 'sku' ];
            }
            // Test that the requested number of items are in inventory: 
            if ($qty){
                
                

                $sql = "replace into cart values( '" . $sku1 . "', " . $qty . " )";
                $db ->query($sql);
                
                

                $sql1 = "update inventory set stock = stock - " . $qty ." Where sku = '" . $sku1 . "'";
                $db -> query($sql1);
                
            }

    }

$sum = "SELECT SUM( cart ) AS c FROM cart";
$rows = $db -> query($sum);

$result = $db->query("select * from inventory");

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
    
        <h1>Store<a style="color: #fff;" href="cart.php"><button class="btn btn-info pull-right">Cart</button></a></h1>
        
        <h3>Here are our sauces for order:</h3>   
            
            <?php 
             
            while ( $row = $result->fetch( PDO::FETCH_ASSOC ) ) {
                         // Do something with $row
                    $title = $row['title'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $stock = $row['stock'];
                    $sku = $row['sku'];
                    $img = $row['img'];
                    echo "<div class='col-md-4 col-sm-6 col-xs-12'>";
                    echo "<h2>" . $title . "</h2>";
                    echo "<img src='$img'>"; 
                    echo "<p>" . $description . "</p>"; 
                    echo "<p>" . "$" . $price . "</p>";
                    echo "<form method='get'>";
                    echo "<p>Qty:";
                    echo "<select name='qty'>";
                        for ($i=1; $i <= $stock; $i++) 
                            { 
                                echo "<option>" . $i . "</option>";
                            }            
                    echo "</select>";
                    echo "</p>";
                    echo '<input type="hidden" name="sku" value="'.$sku.'">';
                    echo "<input type='submit' class='btn btn-primary' value='Add to Cart' />";
                    echo "</form>";
                    echo "</div>";

            }

            ?>

            
         </div>        
    <div class="container">    
        <footer class="row">
            <hr />
            <p class="text">Copyright &copy; Saucenality <? echo date('Y'); ?></p>
        </footer>
    </div>  
    

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="main.js"></script>
</body>

</html>