<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Topics</title>

    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Itim&family=Quicksand:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">

    <!-- STYLES -->
    <link rel="stylesheet" href="public/views/login-page/css/login.css">
</head>
<body>
<h2 class="Login_title">Login</h2>
<form action="login" method="POST" class="Login">
    <div class="message">
        <?php if (isset($messages)) {
            foreach ($messages as $message) {
                echo $message;
            }
        }
        ?>
    </div>
    <h4 class="Login_label">Username</h4>
    <input type="text" name="username" id="username" class="Login_input" placeholder="Type username">

    <h4 class="Login_label">Password</h4>
    <input type="password" name="password" id="password" class="Login_input" placeholder="Type password">

    <button type="submit" class="Login_btn">Login</button>
    <a href="http://localhost:8080/register" class="Login_register">Register</a>
</form>
</body>
</html>