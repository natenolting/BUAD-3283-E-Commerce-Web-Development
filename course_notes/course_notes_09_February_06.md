# Course Notes for February 6th

## PHP Session example

Say we have a scenario where we want refill form fields if there was something wrong with the form.

The route will be `index.php` **&raquo;** `endpoint.php` **&raquo;** catch error and redirect **&raquo;** fix error **&raquo;** success!

### index.php

```php
<?php
  // set start of the sessions before any output is sent
  session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Contact Form</title>
    <style>
      .error {
        font-weight: 700;
        color: red;
      }
    </style>
  </head>
  <body>
    <?php
      // If there is an error set in the endpoint
      // then display it and remove the error afterwards
      // so it doesn't display again.
      if (isset($_SESSION['error_message'])) {
        echo '<p class="error">' . $_SESSION['error_message'] . '</p>';
        unset($_SESSION['error_message']);
      }
    ?>
    <form method="post" action="endpoint.php">
      <!-- Since we will set these values to session keys in endpoint.php we can refill them here of there was an error. -->
      <label for="name">Name</label> <input type="text" id="name" value="<?php echo (isset($_SESSION['name']) ? $_SESSION['name'] : null); ?>" />
      <label for="email">Email</label> <input type="email" id="email" value="<?php echo (isset($_SESSION['email']) ? $_SESSION['email'] : null); ?>" />
      <label for="message">Message</label> <textarea id="message" name="message"><?php echo (isset($_SESSION['message']) ? $_SESSION['message'] : null); ?></textarea>
      <input type="submit" id="submit" value="submit" />
    </form>
  </body>
</html>
```

### endpoint.php

```php
<?php
  // Set start of the sessions before any output is sent
  session_start();
  // Set all the post keys to session keys
  foreach ($_POST as $key => $value) {
      $_SESSION[$key] = $value;
  }
  // Lets say that the email address submitted from the
  // form was not a valid address. We would want to
  // return back to index.php with that error in the sessions.
  // We can check the email address with filter_var()
  if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      $_SESSION['error_message'] = "The email address you submitted is invalid!";
      // Set the return location (similar to window.location in JS)
      header("location: index.php");
      // After the redirect we need to exit the script.
      exit();
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <title>End Point</title>
  </head>
  <body>
      <div class="container">
         <p>Hi <?php echo $_POST['name'] ?>, thanks for the comment. Here's what you sent:</p>
          <table>
              <thead>
              <tr>
                  <th>Input</th>
                  <th>Value</th>
              </tr>
              </thead>
              <tbody>
          <?php
              foreach ($_POST as $key => $val) {
                  echo "<tr>
                          <td>{$key}</td>
                          <td>{$val}</td>
                       </tr>";
              }
          ?>
              </tbody>
          </table>
      </div>
  </body>
</html>
<?php
  // Now that we don't need these session keys anymore
  // we can get rid of them with unset()
  foreach (array_keys($_POST) as $key) {
    if(isset($_SESSION[$key])) {
      unset($_SESSION[$key]);
    }
  }
// No need to use the closing php tag if nothing else needs to be done.
// end of endpoint.php
```
