<?php
namespace App\Auth;
class SimpleAuthenticator extends DummyAuthenticator {

    public function  login($login, $password): bool
    {
        if ($login == $password) {
            $_SESSION['user'] = $login;
            return true;
        } else {
            return false;
        }
    }

}