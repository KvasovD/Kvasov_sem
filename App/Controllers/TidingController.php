<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\RedirectResponse;
use App\Core\Responses\Response;
use App\Models\Tiding;

class TidingController extends AControllerBase
{

    public function index(): Response
    {
        return $this->html();
    }

    public function news(): Response
    {

        $tidings = Tiding::getAll();
        return $this->html(
            [
                'tidings' => $tidings
            ]
        );
    }

    public function save(): Response
    {
        $tiding = new Tiding();
        $tiding->setTitle("New game added");
        $tiding->setText("A new game " . $this->request()->getValue('title') . " has been added to our store." );
        $tiding->setPicture($this->request()->getValue('picture'));
        $tiding->save();

        return new RedirectResponse($this->url("tiding.news"));
    }

}