<?php

/**
 * check entered coordinates with existing
 * @param $form_values
 * @param $form
 * @return bool
 */
function validate_coordinate_is_uniq($form_values, &$form): bool
{
    $pixel = new App\Pixels\Pixel($form_values);
    $pixel = App\App::$db->getRowWhere('pixels',[
        'x' => $pixel->x,
        'y' => $pixel->y
    ]);

    if ($pixel && $pixel['email'] !== App\App::$session->getUser()['email'] ){
//        $form['message'] = 'Negalima perrašyti!';
        return false;
    }

    return true;
}
