<?php
require_once dirname(dirname(__DIR__)) . '/src/bootstrap.php';


//generateFixture();
//echo file_get_contents(__DIR__ . '/products.json');
$parsedJson = json_decode(file_get_contents(__DIR__ . '/products.json'), true);
//foreach ($parsedJson as $item => $key) {
//    $parsedJson[$key]['html'] = "";
//}

//echo '<code><pre>' . print_r($parsedJson, true) . '</pre></code>';
for($i=0, $iCount=count($parsedJson); $i < $iCount; $i++) {
    $parsedJson[$i]['html'] = '<div class="product" id="'. $parsedJson[$i]['id'] .'">';
    $parsedJson[$i]['html'] .= '<p class="product-image"><img src="'. $parsedJson[$i]['image']  .'"/></p>';
    $parsedJson[$i]['html'] .= '<p class="product-title">'. $parsedJson[$i]['title']  .'</p>';
    $parsedJson[$i]['html'] .= '<p class="product-description">'. $parsedJson[$i]['description']  .'</p>';
    $parsedJson[$i]['html'] .= '<p class="product-cost">'. $parsedJson[$i]['cost'] . (strlen($parsedJson[$i]['cost']) === 4 ? '0' : null) .'</p>';
    $form = '<form method="post" action="cart.php" id="form-for-'. $parsedJson[$i]['id'] .'">';
    $form .= '<input type="hidden" name="product-id" value="'. $parsedJson[$i]['id'] .'" />';
    $form .= '<input type="text" name="product-count" value="" placeholder="How Many" />';
    $form .= '<input type="submit" value="submit" />';
    $form .= '</form>';
    $parsedJson[$i]['html'] .= $form . '</div>' . PHP_EOL;
}
//
//
//array_walk($parsedJson, function ($item, $key) {
//    $parsedJson[$key]['html'] = "lorem ipsom";
////
////    return;
////});
//echo json_encode($parsedJson);
//die();
$currentCart = [];
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php
    foreach (['success', 'error'] as $messageType) {
        if(isset($_SESSION[$messageType])) {
            echo '<div class="alert"><div class="alert-'. $messageType .'">' . $_SESSION[$messageType] . '</div></div>';
            unset($_SESSION[$messageType]);
        }
    }
?>
<div class="cart">
    <?php
        if (isset($_SESSION['cart'])) {
            //var_dump($_SESSION['cart']);
            $currentCart = json_decode($_SESSION['cart']);
        }
    echo "<div class=\"cart-preview\"><i class=\"fas fa-shopping-cart\"></i> <span class=\"cart-preview-count\">" . count($currentCart) . "</span></div>";
    //var_dump($currentCart);
    ?>
</div>
<div class="products">
<?php
    array_map(function($element){
        echo $element['html'];
    }, $parsedJson);

?>
</div>
</body>
</html>
