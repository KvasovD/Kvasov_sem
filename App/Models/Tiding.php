<?php

namespace App\Models;

use App\Core\Model;

class Tiding extends Model
{

    protected ?int $id = null;
    protected ?string $title;
    protected ?string $text;
    protected ?string $picture;

    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    public function setText(?string $text): void
    {
        $this->text = $text;
    }

    public function setPicture(?string $picture): void
    {
        $this->picture = $picture;
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

}