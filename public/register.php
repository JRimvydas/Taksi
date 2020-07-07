<?php

require_once '../bootloader.php';

use App\App;

if (App::$session->getUser()) {
    header('Location: index.php');
}

/**
 *form succses atveju sukuriamas failas i kuri irasomi laukeliu duomenys jei email dar nera panaudotas
 *
 * @param array $form
 * @param array $form_values
 */
function form_success(array &$form, array $form_values)
{
    $form_values['password'] = password_hash($form_values['password'], PASSWORD_BCRYPT);

    $user = new \App\Users\User($form_values);
    \App\Users\Model::insert($user);

    header('Location: login.php');
}

$navigation = new \App\Views\Navigation();

$forma = new \App\Views\Forms\Auth\RegistrationForm();
$forma->validate();

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/app.js" defer></script>
</head>
<body>
    <?php print $navigation->render(); ?>
    <h1>Registruotis</h1>
    <?php print $forma->render() ?>
</body>
</html>