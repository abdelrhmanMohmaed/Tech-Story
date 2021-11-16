<?php

require_once("../../app.php");

use TechStory\Classes\Validation\Validator;
use TechStory\Classes\Models\Admin;


if ($request->postHas('submit')) {
    $name = $request->post('name');
    $email = $request->post('email');
    $password = $request->post('password');
    $comfirm_password = $request->post('comfirm_password');

    $validator = new Validator;

    $validator->validate('name', $name, ['required', 'str', 'max']);
    $validator->validate('email', $email, ['required', 'email', 'max']);

    if (!empty($password) and !$password == $comfirm_password) {
        $validator->validate('password', $password, ['required', 'str', 'max']);
    }

    if ($validator->hasErrors()) {
        $session->set('errors', $validator->getErrors());
        $request->aredirect('profile.php');
    } else {


        $ad = new Admin;

        if (!empty($password)) {
            $hashPassword = password_hash($password, PASSWORD_DEFAULT);
            // $adminId =
            $ad->update("name='$name',email='$email',`password`='$hashPassword'",  $session->get('adminId'));
        } else {
            $ad->update("name='$name',email='$email'",  $session->get('adminId'));
        }
        $session->set('success', 'Profile edited successfuly');
        $request->aredirect('handlers/handle-logout.php');
    }
} else {
    $request->aredirect("login.php");
}
