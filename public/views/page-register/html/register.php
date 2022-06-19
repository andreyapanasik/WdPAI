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
    <link rel="stylesheet" href="public/views/register-page/css/register.css">
</head>
<body>
<h2 class="Register_title">Register</h2>
<form action="register" method="POST" class="Register">
    <div class="message">
        <?php if (isset($messages)) {
            foreach ($messages as $message) {
                echo $message;
            }
        }
        ?>
    </div>
    <h4 class="Register_label">Email</h4>
    <input type="email" name="email" id="email" class="Register_input" placeholder="Type email">

    <h4 class="Register_label">Username</h4>
    <input type="text" name="username" id="username" class="Register_input" placeholder="Type username">

    <h4 class="Register_label">Password</h4>
    <input type="password" name="password" id="password" class="Register_input" placeholder="Type password">

    <button type="submit" class="Register_btn">Register</button>
</form>
</body>
</html>