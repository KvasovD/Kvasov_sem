<?php

/** @var Array $data */
/** @var \App\Core\IAuthenticator $auth */

/** @var \App\Core\LinkGenerator $link */
?>

<div class="container">
    <div class="row">
        <div class="col-5">
            <div class="card" style="max-height: 512px; height: 512px">
                <div class="row g-0">
                    <img src="<?= \App\Helpers\FileStorage::UPLOAD_DIR . '/' . @$data['game']?->getPicture() ?>" class="img-fluid">
                </div>
                <div class="row">
                    <div class="card-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium asperiores aut consectetur dicta distinctio, doloremque, eaque eos eum ex incidunt itaque molestias optio perferendis quaerat saepe soluta ullam veniam vitae.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-7" style="max-height: 512px; height: 512px; overflow-y: auto;">
        <?php foreach ($data['reviews'] as $review): ?>
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-12">
                        <div class="card-header">
                            <?= $review->getReviewUsername() ?>
                        </div>
                        <div class="card-body">
                            <p class="card-text"><?= $review->getComment() ?></p>
                            <p class="card-text"><small class="text-muted"><?= $review->getDate() ?></small></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
    <div class="row" style="padding: 10px; margin-top: 30px">
        <div class="card mb-5">
            <div class="row g-0">
                <div class="col-md-9">
                    <div class="card-body d-flex justify-content-between">
                        <h3>Buy <?= @$data['game']?->getTitle() ?></h3>
                        <?php if ($auth->isLogged() && $auth->getLoggedUserRole() == 1) { ?>
                        <div class="btn-group">
                            <a href="<?= $link->url('game.edit', ['id' => @$data['game']?->getId()]) ?>" class="card-text btn btn-primary">Edit</a>
                            <a href="<?= $link->url('game.delete', ['id' => @$data['game']?->getId()]) ?>" class="card-text btn btn-danger">Delete</a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-1">
                    <p class="card-body"><?= @$data['game']?->getPrice() ?> &euro;</p>
                </div>
                <div class="col-md-2" style="margin-top: 10px">
                    <a href="#" class="card-text btn btn-success">Buy</a>
                </div>
            </div>
        </div>
    </div>

    <?php if ($auth->isLogged()) { ?>
    <form style="display: none" class="mt-" id="review" name="review" method="post" action="<?= $link->url('review.comment', ['game_id' => @$data['game']?->getId(), 'user_id' => $auth->getLoggedUserId()]) ?>">

        <div class="mb-3 mt-5">
            <textarea style="width: 100%; resize: none;" form="review" rows="5" id="comment" name="comment">
            </textarea>
        </div>
        <button type="submit" class="btn btn-primary">Post review</button>
    </form>
    <?php } ?>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var reviewForm = document.getElementById("review");

            if (reviewForm) {
                var toggleButton = document.createElement("button");
                toggleButton.textContent = "Leave your review";
                toggleButton.className = "btn btn-secondary mt-3 toggle-button";
                toggleButton.addEventListener("click", function() {
                    reviewForm.style.display = (reviewForm.style.display === "none" || reviewForm.style.display === "") ? "block" : "none";
                });

                var formContainer = document.querySelector(".container");
                formContainer.insertBefore(toggleButton, formContainer.firstChild);
            }
        });
    </script>

    <style>
        .toggle-button {
            position: absolute;
            bottom: 50px;
        }
    </style>

</div>
