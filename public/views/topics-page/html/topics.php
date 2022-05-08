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
    <link rel="stylesheet" href="public/views/topics-page/css/topics.css">
</head>
<body>
<div class="container">
    <div class="Logo_container">
        <img class="Logo" src="public/views/topics-page/assets/logo.svg" alt="logo">
    </div>

    <main class="Topics">
        <?php foreach ($topics as $topic): ?>
            <section class="Topic">
                <img class="Topic_close" src="public/views/topics-page/assets/close.svg" alt="close">
                <h2 class="Topic_theme"><?= $topic->getLabel() ?></h2>
                <hr class="Topic_hr">
                <div class="Topic_content">
                    <?= $topic->getDescription() ?>
                </div>
            </section>
        <?php endforeach; ?>
    </main>
</div>
</body>
</html>