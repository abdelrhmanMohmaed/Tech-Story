<?php

use TechStory\Classes\Models\Order;

require_once("../../app.php");


if ($request->getHas('id')) {
    $id = $request->get('id');
    $ord = new Order;
    $ord->update("status = 'canceled'", $id);

    $session->set('success', 'Order canceled');
    $request->aredirect('orders.php');
}
