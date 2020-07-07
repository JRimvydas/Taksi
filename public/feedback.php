<?php

require_once '../bootloader.php';

use App\Views\Navigation;

$navigation = new Navigation();
$form = new \App\Views\Forms\Comments\CommentForm();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Atsiliepimai</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="./assets/js/main.js" type="module"></script>
</head>
<body>
<?php print $navigation->render(); ?>

    <main>
        <h1>Atsiliepimai</h1>
        <div id="app">
        </div>
        <?php if (\App\App::$session->getUser()): ?>
            <!--            --><?php //print $form->render(); ?>
        <?php else: ?>
            <a href="./register.php" class="button" id="link">Nori komentuoti ? Registruokis</a>
        <?php endif; ?>
        <footer>
            <p>© 2019. Rimvydas Jucius, all rights reserved</p>
        </footer>
    </main>


</body>
</html>