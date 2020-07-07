<?php

require_once '../bootloader.php';

use App\Views\Navigation;

$navigation = new Navigation();

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Taxi Kompanija</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<?php print $navigation->render(); ?>
<main>
    <div class="header">
        <h1>Taksi Kompanija</h1>
    </div>
    <div class="photo"></div>
    <div class="container">
        <div class="card">
            <div class="paslauga paslauga1"></div>
            <h3>Paslauga 1</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium adipisci dolor dolores eaque fugiat
                inventore minus mollitia possimus reprehenderit sapiente sequi, sit voluptatem! A culpa libero quo
                tempore,
                ullam voluptas.</p>
        </div>
        <div class="card">
            <div class="paslauga paslauga2"></div>
            <h3>Paslauga 2</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium adipisci dolor dolores eaque fugiat
                inventore minus mollitia possimus reprehenderit sapiente sequi, sit voluptatem! A culpa libero quo
                tempore, ullam voluptas.</p>
        </div>
        <div class="card">
            <div class="paslauga paslauga3"></div>
            <h3>Paslauga 3</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium adipisci dolor dolores eaque fugiat
                inventore minus mollitia possimus reprehenderit sapiente sequi, sit voluptatem! A culpa libero quo
                tempore, ullam voluptas.</p>
        </div>
    </div>
    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2304.2194261566747!2d25.33569661534373!3d54.723355078378496!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46dd96e7d814e149%3A0xdd7887e198efd4c7!2sSaul%C4%97tekio%20al.%2015%2C%20Vilnius%2010221!5e0!3m2!1slt!2slt!4v1594109020786!5m2!1slt!2slt"
                frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
    <footer>
        <p>© 2019. Rimvydas Jucius, all rights reserved</p>
    </footer>
</main>
</body>
</html>