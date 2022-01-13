<?php

function controllerRegistration(): array
{
    $params['message'] = '';
    $params['style'] = '';
    $params['className'] = 'error';

    if (isset($_POST['newRegistration'])) {
        $params['blockForm'] = registrationForm();
        if (isset($_POST['checkedNewRegistration'])) {
            $params['message'] = checkedRegistrationForm($_POST);
            if ($params['message'] === 'You have successfully registered') {
                $params['className'] = 'valid';
                $params['blockForm'] = authenticationForm();
            }
        }
    } else {
        $params['blockForm'] = authenticationForm();
    }
    if (isset($_POST['authentication'])) {
        $params['message'] = checkedAuthenticationForm($_POST);
        if ($params['message'] === 'ok') {

            $params = goOutForm();
        }
    }
    return $params;
}
