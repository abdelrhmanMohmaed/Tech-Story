<?php

use TechStory\Classes\Models\Order;

require_once("../../app.php");


if ($request->getHas('id')) {
    $id = $request->get('id');
    $ord = new Order;
    $ord->update("status = 'approved'", $id);

    $session->set('success', 'Order Approved');
    $request->aredirect('orders.php');
}




  