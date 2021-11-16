<?php

use TechStory\Classes\Models\Cat;
use TechStory\Classes\Validation\Validator;

require_once("../../app.php");


if ($request->postHas('submit')) {
    $name = $request->post('name');
    $id = $request->post('id');


    $validator = new Validator;
    $validator->validate('name', $name, ['required', 'str', 'max']);
    $validator->validate('id', $id, ['required', 'numeric']);


    if ($validator->hasErrors()) {
        $session->set('errors', $validator->getErrors());
        $request->aredirect("edit-category.php?id=$id");
    } else {
        $c = new Cat;
        $c->update(
            "name = '$name'",
            $id
        );

        $session->set('success', 'Category edited successfully');
        $request->aredirect("categories.php");
    }
} else {
    $request->aredirect("edit-category.php?id=$id");
};
