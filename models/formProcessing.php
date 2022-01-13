<?php

use JetBrains\PhpStorm\NoReturn;

function checkedRegistrationForm($registrationData): string
{
    extract($registrationData);

    $checkedFirstname = strip_tags(htmlspecialchars(mysqli_real_escape_string(_connectDB(), $firstname)));
    $checkedLastname = strip_tags(htmlspecialchars(mysqli_real_escape_string(_connectDB(), $lastname)));
    $checkedEmail = mb_strtolower(strip_tags(htmlspecialchars(mysqli_real_escape_string(_connectDB(), $email))));
    $checkedPassword = password_hash($password, null);

    if ($firstname === ' ' || strlen($firstname) < 1) :
        $message = "Unsuccessful: enter the correct name";
    elseif ($lastname === ' ') :
        $message = "Unsuccessful: fill in the \"last name\" field";
    elseif ($email === ' ') :
        $message = "Unsuccessful: fill in the \"email\" field, it will be your login in the future";
    elseif (checkedEmailBD($checkedEmail)):
        $message = "such a user is already registered";
    elseif ($password === ' ' || strlen($password) < 7) :
        $message = "Unsuccessful: you have not entered enough characters";
    else :
        executeSQL("INSERT INTO users (`firstname`, `lastname`, `email`, `gender`, `password`) 
                      VALUES ('{$checkedFirstname}','{$checkedLastname}','{$checkedEmail}',
                              '{$gender}','{$checkedPassword}')");
        $message = "You have successfully registered";
    endif;

    return $message;
}

function checkedAuthenticationForm($authenticationData): string
{
    extract($authenticationData);

    $login = strip_tags(htmlspecialchars(mysqli_real_escape_string(_connectDB(), $email)));
    $sqlQuery = "SELECT id, firstname, password FROM users WHERE email = '{$login}'";
    $result = oneElementData($sqlQuery);

    if ($result['password'] && password_verify($password, $result['password'])) {
        $_SESSION['login'] = $result['firstname'];
        $_SESSION['userId'] = $result['id'];
        if ($_POST['remember']) {
            $hash = uniqid(rand(), true);
            $sqlUpdate = "UPDATE users SET `hash` = '{$hash}' WHERE id = {$result['id']}";
            executeSQL($sqlUpdate);
            setcookie('hash', $hash, time() + 3600 * 24 * 7, '/');
        }
        return 'ok';
    }
    return 'invalid login or password';
}

function checkedEmailBD($email): bool
{
    $answerEmail = oneElementData("SELECT email FROM users WHERE email = '{$email}'");
    if (is_null($answerEmail)) {
        return false;
    }
    return true;
}

function checkedRegistrationFormAddress($dataAddress): string
{
    extract($dataAddress);

    $checkedState = strip_tags(htmlspecialchars(mysqli_real_escape_string(_connectDB(), $state)));
    $checkedCity = strip_tags(htmlspecialchars(mysqli_real_escape_string(_connectDB(), $city)));
    $checkedStreet = strip_tags(htmlspecialchars(mysqli_real_escape_string(_connectDB(), $street)));
    $checkedHome = strip_tags(htmlspecialchars(mysqli_real_escape_string(_connectDB(), $home)));
    $userId = (int)$_SESSION['userId'];
    if ($checkedState === ' ' ||
        $checkedCity === ' ' ||
        $checkedStreet === ' ' ||
        $checkedHome === ' ') {
        return 'error: the field is not filled in';
    } else {
        $answerDB = oneElementData("SELECT id FROM addresses WHERE user_id = {$userId}");
        if (is_null($answerDB)) {
            executeSQL("INSERT INTO addresses (`user_id`, `state`, `city`, `street`, `home`) VALUES ({$userId}, '{$checkedState}', '{$checkedCity}', '{$checkedStreet}', '{$checkedHome}')");
        } else {
            executeSQL("UPDATE `addresses` SET `state` = '{$checkedState}', `city` = '{$checkedCity}', `street` = '{$checkedStreet}', `home` = '{$checkedHome}' WHERE `user_id` = {$userId}");
        }
        return 'ok';
    }
}





//if (!empty($_FILES)) {
//    $imageInfo = getimagesize($_FILES['myFile']['tmp_name']);
//
//    if ($imageInfo['mime'] != 'image/png' && $imageInfo['mime'] != 'image/jpeg') {
//        $message = "error";
//        exit;
//    } else {
//        $uploadFile = $uploadDir . basename($_FILES['myFile']['name']);
//        $uploadMinFile = $uploadMinDir . basename($_FILES['myFile']['name']);
//        $imageName = (string)$_POST['imageName'];
//        $imageFileName = (string)$_FILES['myFile']['name'];
//        $imageSize = (int)$_FILES['myFile']['size'];
//
//        if (move_uploaded_file($_FILES['myFile']['tmp_name'], $uploadFile)) {
//            $image = new SimpleImage();
//            $image->load($uploadFile);
//            $image->scale(50);
//            $image->save($uploadMinFile);
//            $message = "ok";
//        } else $message = "error";
//
//        insertDataBaseMedia($imageName);
//        insertDataBaseImagesMini($imageName, $imageFileName);
//        insertDataBaseImagesBig($imageName, $imageFileName, $imageSize);
//    }
//
//
//    header("Location: ?page=admin&status={$message}");
//}
