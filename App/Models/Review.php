<?php

namespace App\Models;

use App\Core\Model;

class Review extends Model
{

    protected ?int $id = null;
    protected ?int $user_id;
    protected ?int $game_id;
    protected ?string $comment;
    protected ?string $date;

    public function setUserId(?int $user_id): void
    {
        $this->user_id = $user_id;
    }

    public function setGameId(?int $game_id): void
    {
        $this->game_id = $game_id;
    }

    public function setComment(?string $comment): void
    {
        $this->comment = $comment;
    }

    public function setDate(?string $date): void
    {
        $this->date = $date;
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    public function getGameId(): ?int
    {
        return $this->game_id;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function getReviewUsername(): ?string
    {

        $user = User::getOne($this->user_id);

        return $user->getUsername();
    }

}