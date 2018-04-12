<?php
require_once dirname(dirname(__DIR__)) . '/src/bootstrap.php';

// Check to see if there's a product-id key in the posts array
$productId = isset($_POST['product-id']) ? $_POST['product-id'] : null;

// Check to see if there is a product-count in the posts array
$productCount = isset($_POST['product-count']) ? $_POST['product-count'] : null;

// If either product-id or product-count was missing from the posts array then return with an error
if(!$productId || !$productCount) {
    $_SESSION['error'] = "Product ID and quantity is required";
    header( 'Location:index.php');
    exit();
}

// If product count is not a number redirtect with an error
if(!is_numeric($productCount)) {
    $_SESSION['error'] = "Product quantity should be a number!";
    header( 'Location:index.php');
    exit();
}

// Parse the products data store to a variable.
$parsedJson = json_decode(file_get_contents(__DIR__ . '/products.json'));

// Now check to see if the product submitted is a valid one...
$validProduct = false;
$currentProduct = [];
for($i=0, $iCount=count($parsedJson); $i < $iCount; $i++) {
    if ($parsedJson[$i]->id === $productId) {
        $validProduct = true;
        $currentProduct = $parsedJson[$i];
        break;
    }
}
// If the above was not able to find the product in the list of products then return with an error
if(!$validProduct) {
    $_SESSION['error'] = "Product is not valid.";
    header( 'Location:index.php');
    exit();
}

// Ok, if we've gotten this far then we can add this item to the current customer's cart

// First, we're going to check if the customer has an alredy started cart. If not then create a session for one..
if (!isset($_SESSION['cart'])) {
   $_SESSION['cart'] = json_encode([['productId' => $productId, 'productCount' => $productCount]]);
} else {
    // Second, we'll get the customers's current cart and add this submitted product to it...
    $currentCart = json_decode($_SESSION['cart'], true);
    $foundInCart = false;
    
    // Third, loop over the current customers's cart and add update the quantitly if     
    for($i=0, $iCount=count($currentCart); $i < $iCount; $i++) {
        if ($currentCart[$i]['productId'] === $productId) {
            $currentCart[$i]['productCount'] = $productCount;
            $foundInCart = true;
            break;
        }
    }
    
    // If the produuct was not count in the customer's art already then add a new entry to thier cart
    if ($foundInCart === false) {
       array_push($currentCart, ['productId' => $productId, 'productCount' => $productCount]);
    }
    // Lastly reset the customers cart to the new list of products
    $_SESSION['cart'] = json_encode($currentCart);
}

// All done so redirect back to the home with a success message
$_SESSION['success'] = "You added {$productCount} {$currentProduct->title} to your cart!";
header( 'Location:index.php');
exit();
