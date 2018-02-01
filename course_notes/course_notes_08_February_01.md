# Course Notes for February 1st

## PHP examples

### Hello World
```php
<?php
echo "Hello World";
```

### Capture incoming GET request

contact_form_get.php (or contact_form_get.html):
```HTML
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <title>Contact Form</title>
    </head>
    <body>
        <form action="contact_endpoint_get.php" method="get" class="form">
            <fieldset>
                <legend>Contact Form</legend>
                <label for="method" class="hidden">method</label><input type="hidden" name="method" value="GET">
                <div class="form-group"><label for="name">Name</label> <input type="text" name="name" value="" id="name" placeholder="Your name"></div>
                <div class="form-group"><label for="email">Email</label> <input type="email" name="email" value="" id="email" placeholder="Your Email Address"></div>
                <div class="form-group"><label for="phone">Phone</label> <input type="tel" name="phone" value="" id="phone" placeholder="Your Phone Number"></div>
                <div class="form-group"><label for="comment" class="label-textarea">Comment</label> <textarea id="comment" name="comment" rows="8" cols="40"></textarea></div>
                <div class="form-group"><label for="submit" class="hidden"></label><input type="submit" name="submit" value="Submit" id="submit" class="input-submit"></div>
            </fieldset>
        </form>
    </body>
</html>
```
style.css:
```css
body {
    font-family: "Helvetica Neue", Arial, Helvetica, sans-serif;
    font-size: 16px;
}

.hidden {
    display: none;
}

.form, .form-result {
    width: 50%;
    margin: 20px auto;
}

.form-group {
    margin-bottom: 5px;
}

.form-group label {
    width: 5%;
    text-align: right;
    display: inline-block;
    padding-right: 1%;
}

.form-group .label-textarea {
    vertical-align: top;
    padding-top: 5px;
}


.form-group input, .form-group textarea {
    width: 91%;
    display: inline-block;
    padding: 5px 1%;
    font-size: 14px;
}

.form-group .input-submit {
    padding:5px 15px;
    background:#ccc;
    border:0 none;
    cursor:pointer;
    border-radius: 5px;
    width: auto;
    color: #000;
}

.form-group .input-submit:hover {
    background:#222;
    color: #fff;
}

.form-result .message {
    text-align: center;
    margin-bottom: 10px;
}

.form-result table {
    border-spacing: 0;
    border-collapse: collapse;
    margin: 0 auto;
}

.form-result th {
    font-weight: 700;
    padding: 10px;
    border-bottom: 2px solid #ccc;
    text-align: left;
}

.form-result td {
    font-weight: normal;
    padding: 10px;
    border-bottom: 1px solid #eee;
    text-align: left;

}
```

contact_endpoint_get.php:

```PHP
<!DOCTYPE html>
<html>
<head>
    <title>Contact Form Endpoint</title>
    <link rel="stylesheet" href="style.css">
</head>
    <body>
        <div class="form-result">
        <?php
        echo "<p class='message'>Hi {$_GET['name']}, thanks for the comment from the {$_GET['method']} method contact form. Here's what you sent:</p>";
        ?>
            <table>
                <thead>
                    <tr>
                        <th>Field</th>
                        <th>Value</th>
                    </tr>
                </thead>
                <tbody>
        <?php
        foreach($_GET as $key => $value) {
            if ($key === 'method' || $key === 'submit') {
                continue;
            }
            echo "<tr>
                    <td>{$key}</td>
                    <td>{$value}</td>
                  </tr>";
        }
        ?>
                </tbody>
            </table>
        </div>
    </body>
</html>
```

### Capture incoming POST request

contact_form_post.php (or contact_form_post.html):
```HTML
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <title>Contact Form</title>
    </head>
    <body>
        <form action="contact_endpoint_post.php" method="post" class="form">
            <fieldset>
                <legend>Contact Form</legend>
                <label for="method" class="hidden">method</label><input type="hidden" name="method" value="POST">
                <div class="form-group"><label for="name">Name</label> <input type="text" name="name" value="" id="name" placeholder="Your name"></div>
                <div class="form-group"><label for="email">Email</label> <input type="email" name="email" value="" id="email" placeholder="Your Email Address"></div>
                <div class="form-group"><label for="phone">Phone</label> <input type="tel" name="phone" value="" id="phone" placeholder="Your Phone Number"></div>
                <div class="form-group"><label for="comment" class="label-textarea">Comment</label> <textarea id="comment" name="comment" rows="8" cols="40"></textarea></div>
                <div class="form-group"><label for="submit" class="hidden"></label><input type="submit" name="submit" value="Submit" id="submit" class="input-submit"></div>
            </fieldset>
        </form>
    </body>
</html>
```
contact_endpoint_post.php:
```php
<!DOCTYPE html>
<html>
<head>
    <title>Contact Form Endpoint</title>
    <link rel="stylesheet" href="style.css">
</head>
    <body>
        <div class="form-result">
        <?php
        echo "<p class='message'>Hi {$_POST['name']}, thanks for the comment from the {$_POST['method']} method contact form. Here's what you sent:</p>";
        ?>
            <table>
                <thead>
                    <tr>
                        <th>Field</th>
                        <th>Value</th>
                    </tr>
                </thead>
                <tbody>
        <?php
        foreach($_POST as $key => $value) {
            if ($key === 'method' || $key === 'submit') {
                continue;
            }
            echo "<tr>
                    <td>{$key}</td>
                    <td>{$value}</td>
                  </tr>";
        }
        ?>
                </tbody>
            </table>
        </div>
    </body>
</html>
```
