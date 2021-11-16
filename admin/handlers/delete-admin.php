<?php

use TechStory\Classes\Models\Admin;

require_once("../../app.php");


if ($request->getHas('id')) {
    $id = $request->get('id');
    $a = new Admin;
    $a->delete($id);

    $session->set('success', 'Admin Deleted');
    $request->aredirect('handlers/handle-logout.php');
}
