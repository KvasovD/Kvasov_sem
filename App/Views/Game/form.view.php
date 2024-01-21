<?php if (!is_null(@$data['errors'])): ?>
    <?php foreach ($data['errors'] as $error): ?>
        <div class="alert alert-danger" role="alert">
            <?= $error ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
<form method="post" action="<?= $link->url('game.save') ?>" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?= @$data['game']?->getId() ?>">

    <label for="title" class="form-label">Title:</label>
    <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" value="<?= @$data['game']?->getTitle() ?>" required>

    <label for="inputGroupFile" class="form-label">Picture file:</label>
    <?php if (@$data['game']?->getPicture() != ""): ?>
        <div>File: <?= substr($data['game']->getPicture(), strpos($data['game']->getPicture(), '-') + 1)  ?></div>
    <?php endif; ?>
    <div class="input-group mb-3 has-validation">
        <input type="file" class="form-control" id="inputGroupFile" name="picture" required>
    </div>

    <label for="price" class="form-label">Price:</label>
    <input type="text" class="form-control" inputmode="decimal" id="price" name="price"
           pattern="[0-9]*[.][0-9]*" placeholder="0.00" value="<?= @$data['game']?->getPrice() ?>" required>

    <button type="submit" class="btn btn-primary">Save</button>
</form>
