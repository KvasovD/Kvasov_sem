<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\User;

class UserController extends AControllerBase
{

    public function index(): Response
    {
        return $this->html();
    }

    public function signup(): Response
    {

        $formData = $this->app->getRequest()->getPost();

        if (isset($formData['submit'])) {

            $user = new User();

            $user->setUsername($formData['login']);
            $user->setEmail($formData['email']);

            $password = password_hash($formData['password'], PASSWORD_DEFAULT);
            $user->setPassword($password);

            $user->save();

            $logged = $this->app->getAuth()->login($formData['login'], $formData['password']);
            if ($logged) {
                return $this->redirect($this->url("home.index"));
            }
        }

        return $this->html();
    }
}