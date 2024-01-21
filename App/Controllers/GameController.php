<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\HTTPException;
use App\Core\Responses\RedirectResponse;
use App\Core\Responses\Response;
use App\Helpers\FileStorage;
use App\Models\Game;
use App\Models\Tiding;

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

    public function delete(): Response
    {
        $id = (int) $this->request()->getValue('id');
        $game = Game::getOne($id);

        if (is_null($game)) {
            throw new HTTPException(404);
        } else {
            FileStorage::deleteFile($game->getPicture());
            $game->delete();
            return new RedirectResponse($this->url("home.index"));
        }
    }

    public function save(): Response
    {
        $id = (int)$this->request()->getValue('id');
        $newGame = false;

        if ($id > 0) {
            $game = Game::getOne($id);
            $oldFileName = $game->getPicture();
        } else {
            $game = new Game();
            $newGame = true;
        }
        $game->setTitle($this->request()->getValue('title'));
        $game->setPicture($this->request()->getFiles()['picture']['name']);
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
            if ($oldFileName != "") {
                FileStorage::deleteFile($oldFileName);
            }
            $newFileName = FileStorage::saveFile($this->request()->getFiles()['picture']);
            $game->setPicture($newFileName);
            $game->save();

            if($newGame) {

                return $this->redirect($this->url("tiding.save", ['title' => $this->request()->getValue('title'), 'picture' => $newFileName]));
            }

            return new RedirectResponse($this->url("home.index"));
        }
    }

    private function formErrors(): array
    {
        $errors = [];

        if ($this->request()->getValue('price') <= 0) {
            $errors[] = "Price must be grater then 0";
        }
        if (is_float($this->request()->getValue('price'))) {
            $errors[] = "Price have format 0.00";
        }
        return $errors;
    }
}