<?php

use TechStory\Classes\Cart;

require_once("../app.php");

if ($request->postHas('submit')) {
    $id = $request->post('id');
    $name = $request->post('name');
    $img = $request->post('img');
    $price = $request->post('price');
    $qty = $request->post('qty');

    $prodData = [
        'name' => $name,
        'price' => $price,
        'img' => $img,
        'qty' => $qty,
    ];

    $cart = new Cart;
    $cart->add($id, $prodData);


    $request->redirect('products.php');
}
