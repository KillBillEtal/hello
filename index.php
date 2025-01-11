<?php
    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }

    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
      unset($_SESSION['logged_in_expiration']);
      $_SESSION['logged_in'] = false;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css\styles.css">
        <title>Ma page</title>
    </head>
    <body>
      <?php if (isset($_SESSION['error_message'])): ?>
        <p class="error-message"><?= htmlspecialchars($_SESSION['error_message']) ?></p>
        <?php unset($_SESSION['error_message']); ?>
      <?php endif; ?>  
      <form action="auth.php" method="post">      
        <div class="container">
          <label for="uname"><b>Username</b></label>
          <input type="text" placeholder="Enter Username" name="uname" value="<?= htmlspecialchars("admin") ?>" required>
      
          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="psw" required>
      
          <button type="submit">Login</button>
        </div>
      </form> 
    </body>
</html>