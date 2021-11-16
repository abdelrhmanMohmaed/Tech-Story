<?php

require_once("app.php");

use TechStory\Classes\Validation\Validator;
use TechStory\Classes\Db;
use TechStory\Classes\Models\Admin;
use TechStory\Classes\Models\Product;
use TechStory\Classes\Models\Cat;
use TechStory\Classes\Models\Order;
use TechStory\Classes\Session;

// $v = new Validator;
// $v->validate('age', 'aa', [
//     'required', 'numeric'
// ]);
$session = new Session;
// echo '<pre>';
// print_r($v->getErrors());
// echo '</pre>';
// $log = new Admin;
// $re = $log->login("abdo@admin.com", "12345",$session);
// echo "<pre>";
// var_dump($re);
// echo "</pre>";


// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';

$ord = new Order;

$order = $ord->selectId(2, "orders.*, SUM(qty*price) AS total");

echo '<pre>';
print_r($order);
echo '</pre>';
