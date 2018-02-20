<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    $content = 'home';
    if (isset($_GET['p']) && file_exists('pages/'. $_GET['p'] . '.php')) {
       $content = $_GET['p'];
    } elseif (isset($_GET['p']) && !file_exists('pages/'. $_GET['p'] . '.php')) {
        $content = '404';
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <div class="masthead"><?php include 'modules/masthead.php'; ?></div>
        <div class="navigation"><?php include 'modules/navigation.php'; ?></div>
        <div class="content"><?php include 'pages/'. $content . '.php'; ?></div>
        <div class="footer"><?php include 'modules/footer.php'; ?></div>
    </body>
</html>