<?php

require_once '../bootloader.php';

use App\App;
use App\Users\Model;

if (App::$session->getUser()) {
    header('Location: index.php');
}

/**
 *form succses atveju sukuriamas failas i kuri irasomi laukeliu duomenys
 *
 * @param array $form
 * @param array $form_values
 */
function form_success(array &$form, array $form_values)
{

    $userData = Model::getWhere([
        'email' => $form_values['email']
    ]);
    $user = $userData[0];

    App::$session->login($user->email, $user->password);

    header('Location: index.php');
}

/**
 *jei submitinus forma yra klaidu parasome message
 *
 * @param array $form
 * @param array $form_values
 * @return bool
 */
function form_fail(array &$form, array $form_values)
{
    $user = App::$db->getRowWhere('users', ['email' => $form_values['email']]);

    if ($form_values['email'] == $user['email']) {
        $form['message']['error'] = 'Klaidingas slaptažodis';
        return false;
    } else {
        $form['message']['error'] = 'Tokio vartotojo nėra';
    }

}
$navigation = new \App\Views\Navigation();
$forma = new \App\Views\Forms\Auth\LoginForm();
$forma->validate();

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/app.js" defer></script>
</head>
<body>
    <?php print $navigation->render(); ?>
    <h1>Prisijungti</h1>
    <?php print $forma->render() ?>
</body>
</html>
