<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Game;

/**
 * Class HomeController
 * Example class of a controller
 * @package App\Controllers
 */
class HomeController extends AControllerBase
{
    /**
     * Authorize controller actions
     * @param $action
     * @return bool
     */
    public function authorize($action)
    {
        return true;
    }

    /**
     * Example of an action (authorization needed)
     * @return \App\Core\Responses\Response|\App\Core\Responses\ViewResponse
     */
    public function index(): Response
    {
        $param = "%" . $this->request()->getValue('search') . "%";
        $games = Game::getAll('`title` LIKE ?', [$param]);
        return $this->html(
            [
                'games' => $games
            ]
        );
    }

    /**
     * Example of an action accessible without authorization
     * @return \App\Core\Responses\ViewResponse
     */
    public function contact(): Response
    {
        return $this->html();
    }

    public function game_info(): Response
    {
        $id = (int) $this->request()->getValue('id');
        return $this->html(
            [
                'game' => Game::getOne($id)
            ]
        );
    }
}
