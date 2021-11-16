<?php

namespace TechStory\Classes\Models;

use  TechStory\Classes\Db;
use TechStory\Classes\Session;

class Admin extends Db
{
    public function __construct()
    {
        $this->table = "admins";
        $this->connect();
    }
    public function login(string $email, string $password, Session  $session)
    {
        $sql = "SELECT * FROM $this->table WHERE  email = '$email' LIMIT 1";
        // return   var_dump($sql);
        $result = mysqli_query($this->conn, $sql);
        $admin = mysqli_fetch_assoc($result);
        // return $admin;
        if (!empty($admin)) {
            $hashPassword = $admin['password'];
            $isSame = password_verify($password, $hashPassword);

            if ($isSame) {
                $session->set('adminId', $admin['id']);
                $session->set('adminName', $admin['name']);
                $session->set('adminEmail', $admin['email']);
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function logOut(Session $session)
    {
        $session->remove('adminId');
        $session->remove('adminName');
        $session->remove('adminEmail');
    }
}
