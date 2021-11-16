<?php

use TechStory\Classes\Models\Cat;
use TechStory\Classes\Validation\Validator;

require_once("../../app.php");


if ($request->postHas('submit')) {
    $name = $request->post('name');

    $validator = new Validator;
    $validator->validate('name', $name, ['required', 'str', 'max']);

    if ($validator->hasErrors()) {
        $session->set('errors', $validator->getErrors());
        $request->aredirect('add-category.php');
    } else {
        $c = new Cat;
        $c->insert("name", "'$name'");

        $session->set('success', 'Categories added successfully');
        $request->aredirect("categories.php");
    }
} else {
    $request->aredirect("add-category.php");
};
