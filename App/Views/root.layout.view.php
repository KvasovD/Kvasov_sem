<?php

/** @var string $contentHTML */
/** @var \App\Core\IAuthenticator $auth */
/** @var \App\Core\LinkGenerator $link */
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <title><?= \App\Config\Configuration::APP_NAME ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="public/css/styl.css">
    <script src="public/js/script.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= $link->url("home.index") ?>">
            <img src="public/images/shop_logo.png" title="<?= \App\Config\Configuration::APP_NAME ?>"
                 title="<?= \App\Config\Configuration::APP_NAME ?>">
        </a>

        <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?= $link->url("tiding.news") ?>">News</a>
            </li>
            <?php if ($auth->isLogged() && $auth->getLoggedUserRole() == 1) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $link->url("game.add") ?>">New game</a>
                </li>
            <?php } ?>
        </ul>
        <ul class="navbar-nav" style="list-style: none; padding: 0; margin: 0; display: inline-block; text-align: left;">
        <?php if ($auth->isLogged()) { ?>
            <li class="nav-item">
                <span class="navbar-text">User online: <b><?= $auth->getLoggedUserName() ?></b></span>
            </li>
        <?php } ?>
        </ul>
        <ul class="navbar-nav ms-auto">
            <?php if ($auth->isLogged()) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $link->url("auth.logout") ?>">Logout</a>
                </li>
            <?php } else { ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $link->url("user.signup") ?>">Sign up</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= \App\Config\Configuration::LOGIN_URL ?>">Login</a>
                </li>
            <?php } ?>
        </ul>

    </div>
</nav>
<div class="container-fluid mt-3">
    <div class="web-content">
        <?= $contentHTML ?>
    </div>
</div>
</body>
</html>
