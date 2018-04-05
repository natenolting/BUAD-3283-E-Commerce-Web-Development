<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Image Rotator</title>
    <link rel="stylesheet" href="node_modules/slick-carousel/slick/slick.css">
    <link rel="stylesheet" href="node_modules/slick-carousel/slick/slick-theme.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <ul id="imageRotator">
        <?php
        $image = 10;
            for($i=0; $i < $image; $i++) {
                echo '<li class="rotatorImageContainer" id="rotatorImage'.$i.'"><img src="https://via.placeholder.com/500x300?text=Image+'. $i .'" alt=""></li>';
            }

        ?>
    </ul>
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/slick-carousel/slick/slick.min.js"></script>
    <script>
        $(document).ready(function() {
            var imageRotator = $("#imageRotator");
            console.log(imageRotator);
            imageRotator.slick();

        })
    </script>
</body>
</html>