<?php

/**
 *checking validate field is empty or not
 *
 * @param $field_value
 * @param $field
 * @return bool
 */
function validate_field_not_empty($field_value, &$field): bool
{
    if (!$field_value) {
        $field['error'] = 'Palikote tuščią laukelį';
        return false;
    } else {
        return true;
    }
}

/**
 * checking entered value is numeric
 * @param $field_value
 * @param $field
 * @return bool
 */
function validate_field_is_numeric($field_value, &$field): bool
{
    if (!is_numeric($field_value)) {
        $field['error'] = 'Laukelis turi buti skaicius';
        return false;
    } else {
        return true;
    }
}

/**
 * Validate field number range
 *
 * @param $field_value
 * @param array $field
 * @param array $params
 * @return bool
 */
function validate_field_range($field_value, array &$field, array $params): bool
{
    if ($field_value >= $params['min'] && $field_value <= $params['max']) {
        return true;
    } else {
        $field['error'] = "Netinkamas skaičius skaičius turi būti nuo {$params['min']} iki {$params['max']}";
        return false;
    }
}

/**
 * @param $field_value
 * @param array $field
 * @return bool
 */
function validate_field_has_upper_case($field_value, array &$field): bool
{
    if (!preg_match('/[A-Z]/', $field_value)) {
        $field['error'] = "Slaptažodyje turi būti Didžioji raidė";
        return false;
    }

    return true;
}

/**
 * check field length
 *
 * @param $field_value
 * @param array $field
 * @param array $params
 * @return bool
 */
function validate_field_length($field_value, array &$field, array $params): bool
{
    if (strlen($field_value) >= $params['min'] && strlen($field_value) <= $params['max']) {
        return true;
    }

    $field['error'] = "Slaptažodis turi būti nuo {$params['min']} iki {$params['max']} simbolių";
    return false;
}

/**
 * validate_fields_match
 * Checks if form fields match
 *
 * @param array $form_values
 * @param $form
 * @param array $params
 * @return bool
 */
function validate_field_match(array $form_values, &$form, array $params): bool
{
    $values = [];
    $result = true;
    foreach ($params as $param) {
        $reference = $reference ?? $form_values[$param];
        $values[] = $form_values[$param];
        if ($reference !== $form_values[$param]) {
            $form['fields'][$param]['error'] = 'Slaptažodžių laukeliai turi sutapti';

            $result = false;
        }
    }

    return $result;
}

/**
 * check user email and password inputs value with db info
 *
 * @param array $form_values
 * @return bool
 */
function validate_login(array $form_values)
{
    $user_data = App\Users\Model::getWhere(['email' => $form_values['email']]);

    $user = $user_data[0] ?? null;
    if (!$user || !password_verify($form_values['password'], $user->password)) {
        return false;
    }
    return true;

}

/**
 * if no such user in db creates new user
 *
 * @param array $form_values
 * @param $form
 * @param $params
 * @return bool
 */
function validate_register(array $form_values, &$form, array $params)
{
    $unique_field = $params['field'];
    $user = App\App::$db->getRowWhere('users', [
        $unique_field => $form_values[$unique_field],
    ]);

    if ($user) {
        $form['fields'][$unique_field]['error'] = 'El. paštas jau egzistuoja';
        return false;
    }

    return true;
}
