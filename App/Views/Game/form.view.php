<?php if (!is_null(@$data['errors'])): ?>
    <?php foreach ($data['errors'] as $error): ?>
        <div class="alert alert-danger" role="alert">
            <?= $error ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
<form method="post" action="<?= $link->url('game.save') ?>">

    <input type="hidden" name="id" value="<?= @$data['game']?->getId() ?>">

    <div class="mb-3 mt-3">
        <label for="title" class="form-label">Title:</label>
        <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" value="<?= @$data['game']?->getTitle() ?>" required>
    </div>
    <div class="mb-3 mt-3">
        <label for="picture" class="form-label">Picture:</label>
        <input type="text" class="form-control" id="picture" placeholder="Enter: public/images/picture_name.jpg " name="picture" value="<?= @$data['game']?->getPicture() ?>" required>
    </div>
    <div class="mb-3 mt-3">
        <label for="price" class="form-label">Price:</label>
        <input type="text" class="form-control" inputmode="decimal" id="price" name="price"
               pattern="[0-9]*[.][0-9]*" placeholder="0.00" value="<?= @$data['game']?->getPrice() ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>
