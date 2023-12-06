<?php

/** @var Array $data */
/** @var \App\Core\IAuthenticator $auth */

/** @var \App\Core\LinkGenerator $link */
?>

<div class="container">
    <div class="row">
        <div id="myCarousel" class="carousel slide mb-6 col-7" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <svg class="bd-placeholder-img" width="100%" height="512px" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/></svg>
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>screenshot from game</h1>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <svg class="bd-placeholder-img" width="100%" height="512px" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/></svg>
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>screenshot from game</h1>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <svg class="bd-placeholder-img" width="100%" height="512px" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/></svg>
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>screenshot from game</h1>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="col-5">
            <div class="card" style="max-height: 512px; height: 512px">
                <div class="row g-0">
                    <img src="<?= @$data['game']?->getPicture() ?>" class="img-fluid">
                </div>
                <div class="row">
                    <div class="card-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium asperiores aut consectetur dicta distinctio, doloremque, eaque eos eum ex incidunt itaque molestias optio perferendis quaerat saepe soluta ullam veniam vitae.</p>
                    </div>
                </div>
                <div class="row">
                    <p class="card-text"><small class="text-body-secondary">game tags:...</small></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="padding: 10px; margin-top: 30px">
        <div class="card">
            <div class="row g-0">
                <div class="col-md-9">
                    <div class="card-body d-flex justify-content-between">
                        <h3>Buy <?= @$data['game']?->getTitle() ?></h3>
                        <?php if ($auth->isLogged() && $auth->getLoggedUserName() == "admin") { ?>
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
                    <a href="#" class="card-text btn btn-success">Add to Cart</a>
                </div>
            </div>
        </div>
    </div>


</div>
