<?php

use TechStory\Classes\File;
use TechStory\Classes\Models\Product;
use TechStory\Classes\Validation\Validator;

require_once("../../app.php");


if ($request->postHas('submit')) {
    $name = $request->post('name');
    $id = $request->post('id');
    $cat_id = $request->post('cat_id');
    $price = $request->post('price');
    $pieces_no = $request->post('pieces_no');
    $desc = $request->post('desc');
    $img = $request->file('img');

    $validator = new Validator;
    $validator->validate('name', $name, ['required', 'str', 'max']);
    $validator->validate('cat_id', $cat_id, ['required', 'numeric']);
    $validator->validate('price', $price, ['required', 'numeric']);
    $validator->validate('pieces number', $pieces_no, ['required', 'numeric']);
    $validator->validate('description', $desc, ['required', 'str']);

    if ($img['error'] == 0) {
        $validator->validate('image', $img, ['image']);
    }


    if ($validator->hasErrors()) {
        $session->set('errors', $validator->getErrors());
        $request->aredirect("edit-product.php?id=$id");
    } else {
        $pr = new Product;
        $imgName = $pr->selectId($id, 'img')['img'];

        if ($img['error'] == 0) {
            unlink(PATH . "uploads/$imgName");
            $file = new File($img);
            $imgName =  $file->rename()->upload();
        }

        $pr->update(
            "name = '$name', `desc` = '$desc', price = '$price' pieces_no = '$pieces_no', img='$imgName', 
            cat_id = '$cat_id'",
            $id
        );
  
        $session->set('success', 'product edited successfully');
        $request->aredirect("products.php");
    }
} else {
    $request->aredirect("edit-product.php?id=$id");
};
