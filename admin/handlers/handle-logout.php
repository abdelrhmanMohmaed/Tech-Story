<?php
require_once("../../app.php");

use TechStory\Classes\Models\Admin;


$ad = new Admin;
$ad->logOut($session);

$request->aredirect('login.php');
