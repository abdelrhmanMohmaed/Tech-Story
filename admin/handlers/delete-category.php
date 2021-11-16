<?php

use TechStory\Classes\Models\Cat;

require_once("../../app.php");


if ($request->getHas('id')) {
    $id = $request->get('id');
    $c = new Cat;
    $c->delete($id);

    $session->set('success', 'Order Deleted');
    $request->aredirect('categories.php');
}
