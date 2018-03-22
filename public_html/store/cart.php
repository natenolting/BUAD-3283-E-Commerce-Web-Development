<?php
require_once dirname(dirname(__DIR__)) . '/src/bootstrap.php';

$productId = isset($_POST['product-id']) ? $_POST['product-id'] : null;
$productCount = isset($_POST['product-count']) ? $_POST['product-count'] : null;

if(!is_numeric($productCount)) {
    $_SESSION['error'] = "Product quantity should be a number!";
    header( 'Location:index.php');
    exit();
}


if(!$productId || !$productCount) {
    $_SESSION['error'] = "Product ID and quantity is required";
    header( 'Location:index.php');
    exit();
}

$parsedJson = json_decode(file_get_contents(__DIR__ . '/products.json'));

//dd(json_encode($parsedJson));
$validProduct = false;
$currentProduct = [];
for($i=0, $iCount=count($parsedJson); $i < $iCount; $i++) {
    if ($parsedJson[$i]->id === $productId) {
        $validProduct = true;
        $currentProduct = $parsedJson[$i];
        break;
    }
}

if(!$validProduct) {
    $_SESSION['error'] = "Product is not valid.";
    header( 'Location:index.php');
    exit();
}

//dd($currentProduct, $productId, $productCount);

if (!isset($_SESSION['cart'])) {
   $_SESSION['cart'] = json_encode([['productId' => $productId, 'productCount' => $productCount]]);
} else {
    $currentCart = json_decode($_SESSION['cart'], true);
    $foundInCart = false;

    for($i=0, $iCount=count($currentCart); $i < $iCount; $i++) {
        if ($currentCart[$i]['productId'] === $productId) {
            $currentCart[$i]['productCount'] = $productCount;
            $foundInCart = true;
            break;
        }
    }

    if ($foundInCart === false) {
       array_push($currentCart, ['productId' => $productId, 'productCount' => $productCount]);
    }

    $_SESSION['cart'] = json_encode($currentCart);
}

$_SESSION['success'] = "You added {$productCount} {$currentProduct->title} to your cart!";
header( 'Location:index.php');
exit();



