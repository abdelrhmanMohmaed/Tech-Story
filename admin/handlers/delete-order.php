<?php

use TechStory\Classes\Models\Order;

require_once("../../app.php");


if ($request->getHas('id')) {
    $id = $request->get('id');
    $ord = new Order;
    $ord->delete($id);

    $session->set('success', 'Order Deleted');
    $request->aredirect('orders.php');
}
