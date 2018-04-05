<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- include bootstrap css -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <!-- include slick-carousel css -->
    <link rel="stylesheet" href="node_modules/slick-carousel/slick/slick.css">
    <link rel="stylesheet" href="node_modules/slick-carousel/slick/slick-theme.css">
    <!-- include our css -->
    <link rel="stylesheet" href="styles.css">
    <title>Image Rotator</title>
</head>
<body>
<!-- Container to place the images in -->
<ul id="rotatorContainer" class="rotatorContainer"></ul>


<!-- include Jquery -->
<script src="node_modules/jquery/dist/jquery.min.js"></script>
<!-- include slick-carousel js -->
<script src="node_modules/slick-carousel/slick/slick.min.js"></script>
<!-- handle the carousel here -->
<script>
    $(document).ready(function() {
        // the container to use for the rotator
        var rotatorContainer = $('#rotatorContainer');
        // how many to use in the rotator
        var insertImages = 9;
        // how many have we added?
        var insertedImages;
        // while the insertedImages number is less than the insertImages value, then add list elements to the container with placeholder images
        for (insertedImages = 0; insertedImages <= insertImages; insertedImages++) {
            console.log(insertedImages);
            rotatorContainer.append($("<li/>", {
                    id: "rotatorImage" + insertedImages,
                    "class": "rotatorImageContainer",
                    html: '<img src="https://via.placeholder.com/500x300?text=Image+'+ (insertedImages+1) +'">'
                })
            )
        }
        rotatorContainer.slick({
            fade: true,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 2000,
            dots: true,
            cssEase: 'linear',
            centerMode: true
        });
    });

</script>
</body>
</html>