<?php

/** @var Array $data */
/** @var \App\Models\Game $game */
/** @var \App\Core\IAuthenticator $auth */

/** @var \App\Core\LinkGenerator $link */
?>

<div class="container">
    <form method="get" action="<?= $link->url("home.search") ?>" class="mb-3 offset-md-3">
        <div class="input-group" style="max-width: 632px">
            <input type="text" class="form-control" name="search" placeholder="Search by title...">
            <button type="submit" class="btn btn-primary">Find</button>
        </div>
    </form>

    <?php foreach ($data['games'] as $game): ?>
    <div class="card mb-3 offset-md-3" style="max-height: 69px; max-width: 632px">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="<?= $game->getPicture() ?>" class="img-fluid rounded-start" style="max-height: 67px">
            </div>
            <div class="col-md-6">
                <div class="card-text">
                    <a href="<?= $link->url("home.game_info", ['id' => $game->getId()]) ?>" class="stretched-link" style="color: black; text-decoration: none">
                        <h6><?= $game->getTitle() ?></h6>
                    </a>
                </div>
            </div>
            <div class="col-md-2">
                <p class="card-body"><?= $game->getPrice() ?> &euro;</p>
            </div>
        </div>
    </div>
    <?php endforeach; ?>


</div>
