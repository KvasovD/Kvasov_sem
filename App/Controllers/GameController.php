<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\HTTPException;
use App\Core\Responses\RedirectResponse;
use App\Core\Responses\Response;
use App\Models\Game;

class GameController extends AControllerBase
{

    public function index(): Response
    {
        return $this->html(
            [
                'games' => Game::getAll()
            ]
        );
    }

    public function add(): Response
    {
        return $this->html();
    }

    public function edit(): Response
    {
        $id = (int) $this->request()->getValue('id');
        $game = Game::getOne($id);

        if (is_null($game)) {
            throw new HTTPException(404);
        }

        return $this->html(
            [
                'game' => $game
            ]
        );
    }

    public function delete()
    {
        $id = (int) $this->request()->getValue('id');
        $game = Game::getOne($id);

        if (is_null($game)) {
            throw new HTTPException(404);
        } else {
            $game->delete();
            return new RedirectResponse($this->url("home.index"));
        }
    }

    public function save()
    {
        $id = (int)$this->request()->getValue('id');

        if ($id > 0) {
            $game = Game::getOne($id);
        } else {
            $game = new Game();
        }
        $game->setTitle($this->request()->getValue('title'));
        $game->setPicture($this->request()->getValue('picture'));
        $game->setPrice($this->request()->getValue('price'));


        $formErrors = $this->formErrors();
        if (count($formErrors) > 0) {
            return $this->html(
                [
                    'game' => $game,
                    'errors' => $formErrors
                ], 'add'
            );
        } else {
            $game->save();
            return new RedirectResponse($this->url("home.index"));
        }
    }

    private function formErrors(): array
    {
        $errors = [];

        if (!strstr($this->request()->getValue('picture'), 'public/images/')) {
            $errors[] = "write a image path with 'public/images/picture_name.jpg'";
        }
        if ($this->request()->getValue('price') <= 0) {
            $errors[] = "Price must be grater then 0";
        }
        if (is_float($this->request()->getValue('price'))) {
            $errors[] = "Price have format 0.00";
        }
        return $errors;
    }
}