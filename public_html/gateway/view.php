<?php
/** @var string $title */
/** @var string $body */
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Load in the head defaults https://gethead.info/#recommended-minimum -->
        <meta charset="utf-8"/>
        <meta http-equiv="x-ua-compatible" content="ie=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <link rel="stylesheet"
              href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
              integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
              crossorigin="anonymous" />
        <link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css"
              rel="stylesheet" />

        <link href="styles/styles.css"
              rel="stylesheet" />
        <title><?php echo $title; ?></title>
    </head>
    <body>
    <!-- Jumbotron row-->
    <div class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1><?php echo $title; ?></h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php echo $body; ?>
            </div>
        </div>
    </div>
    </body>
</html>