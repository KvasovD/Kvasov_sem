<?php

/** @var Array $data */
/** @var \App\Models\Tiding $tiding */
/** @var \App\Core\IAuthenticator $auth */

/** @var \App\Core\LinkGenerator $link */
?>

<div class="container">

    <?php foreach ($data['tidings'] as $tiding): ?>
        <div class="card" style="max-height: 69px;">
            <div class="row g-0">
                <div class="col-md-2">
                    <img src="<?= \App\Helpers\FileStorage::UPLOAD_DIR . '/' . $tiding->getPicture() ?>" class="img-fluid rounded-start" style="max-height: 67px">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h6 class="card-title"><?= $tiding->getTitle() ?></h6>
                        <p class="card-text"><?= $tiding->getText() ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>


</div>
