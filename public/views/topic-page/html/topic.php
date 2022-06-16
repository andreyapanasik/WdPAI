<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Topic</title>

    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Itim&family=Quicksand:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">

    <!-- STYLES -->
    <link rel="stylesheet" href="public/views/topic-page/css/topic.css">
</head>
<body>
<div class="container">
    <div class="Logo_container">
        <img class="Logo" src="public/views/assets/logo.svg" alt="logo">
    </div>
    <?php foreach ($comments as $comment): ?>
        <div class="Topic">
            <h2 class="Topic_name">Topic</h2>
            <hr class="Topic_hr">
            <div class="Topic_feedback">
                <h5 class="Topic_feedback_username">"Username"</h5>
                <h5 class="Topic_feedback_data">DD-MM-YYYY</h5>
                <p class="Topic_feedback_comment"><?= $comment->getContent() ?></p>
            </div>

            <form action="" class="Topic_create_feedback">
                <h5 class="Topic_create_username">"Username"</h5>
                <h5 class="Topic_create_data">DD-MM-YYYY</h5>
                <input class="Topic_input" type="text" placeholder="Add your comment">
                <div class="Topic_btn_container">
                    <button class="Topic_btn" type="submit">Add comment</button>
                </div>
            </form>
        </div>
    <?php endforeach; ?>
</div>
</body>
</html>