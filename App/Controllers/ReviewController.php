<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\RedirectResponse;
use App\Core\Responses\Response;
use App\Models\Game;
use App\Models\Review;

class ReviewController extends AControllerBase
{

    public function index(): Response
    {
        return $this->html();
    }

    public function comment(): Response
    {
        $game_id = (int)$this->request()->getValue('game_id');
        $user_id = (int)$this->request()->getValue('user_id');

        $review = new Review();

        $review->setGameId($game_id);
        $review->setUserId($user_id);
        $review->setComment($this->request()->getValue('comment'));
        $review->setDate(date("Y-m-d"));

        $review->save();

        return new RedirectResponse($this->url("home.index"));
    }
}