<?php

use TechStory\Classes\Cart;
use TechStory\Classes\Models\Order;
use TechStory\Classes\Models\OrderDetails;
use TechStory\Classes\Validation\Validator;

require_once("../app.php");
$cart = new Cart;

if ($request->postHas('submit') and $cart->count() !== 0) {
    $name = $request->post('name');
    $email = $request->post('email');
    $phone = $request->post('phone');
    $address = $request->post('address');

    $validator = new Validator;
    $validator->validate('name', $name, ['required', 'str', 'max']);
    if (!empty($email)) {
        $validator->validate('email', $email, ['email', 'max']);
        $email = "$email";
    } else {
        $email = "NULL";
    }
    if (!empty($address)) {
        $validator->validate('address', $address, ['str', 'max']);
        $address = "$address";
    } else {
        $address = "NULL";
    }
    $validator->validate('phone', $phone, ['required', 'str', 'max']);

    if ($validator->hasErrors()) {
        $session->set('errors', $validator->getErrors());
        $request->redirect('cart.php');
    } else {

        $order = new Order;
        $orderDetail = new OrderDetails;

        $orderId = $order->insertAndGetId("name ,email ,phone ,address", "'$name','$email','$phone','$address'");


        foreach ($cart->all() as $prodId => $prodData) {
            $qty = $prodData['qty'];
            $orderDetail->insert('order_id,product_id,qty', "'$orderId','$prodId','$qty'");
        }
        $cart->empty();
        
        $session->set('success', 'Order Created');
        $request->redirect('products.php');
    }
} else {
    $request->redirect('product.php');
}
