<?php
namespace App\Auth;
use App\Core\IAuthenticator;
use App\Models\User;

class SimpleAuthenticator extends DummyAuthenticator
{

    public function  login($login, $password): bool
    {

        $users = User::getAll('`username` LIKE ?', [$login]);

        if ($login == $users[0]->getUsername() && password_verify($password, $users[0]->getPassword())) {
            $_SESSION['user'] = $users[0]->getId();
            return true;
        } else {
            return false;
        }
    }

    public function getLoggedUserName(): string
    {
        if (isset($_SESSION['user'])) {
            $user = User::getOne($_SESSION['user']);

            return $user->getUsername();
        } else {
            throw new \Exception("User not logged in");
        }
    }

    public function getLoggedUserRole(): int
    {
        if (isset($_SESSION['user'])) {
            $user = User::getOne($_SESSION['user']);

            return $user->getRole();
        } else {
            throw new \Exception("User not logged in");
        }
    }
}