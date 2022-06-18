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
        <img class="Logo" src="public/views/assets/logo.svg" alt="logo">
    </div>

    <main class="Topics">
        <?php foreach ($topics as $topic): ?>
            <section class="Topic">
                <button class="Topic_close">
                    <img src="public/views/assets/close.svg" alt="close">
                </button>
                <form action="comments" method="POST">
                    <input name="topicID" id="topicID" type="hidden"
                           value=<?= $topic->getID() ?>>
                    <button class="Topic_choose" type="submit">Go to topic</button>
                </form>
                <form action="deleteTopic" method="POST" class="Topic_close">
                    <input class="Topic_input" name="topicID" id="topicID" type="hidden"
                           value=<?= $topic->getID() ?>>
                    <button class="Topic_close" type="submit">
                        <img src="public/views/assets/close.svg" class="Topic_close_img" alt="close">
                    </button>
                </form>
                <h2 class="Topic_theme"><?= $topic->getLabel() ?></h2>
                <hr class="Topic_hr">
                <div class="Topic_content">
                    <?= $topic->getDescription() ?>
                </div>
            </section>
        <?php endforeach; ?>
    </main>

    <form action="createTopic" method="POST" class="Topic_create">
        <input class="Topic_input" name="title" id="title" type="text" placeholder="Create your topic">
        <hr class="Topic_hr">
        <input class="Topic_input_descr" name="description" id="description" type="text" placeholder="Add description">
        <button class="Topic_btn" type="submit">Create topic</button>
    </form>
</div>
</body>
</html>