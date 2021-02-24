<main class="container">
    <div class="form__container">
        <h1>This is DogRegister</h1>
        <form method="GET" action="<?= base_url('/') ?>">
            <?php foreach ($fields as $id => $field) : ?>
                <div class="form__group">
                    <label for="<?= $id ?>"><?= $field ?></label>
                    <input type="text" id="<?= $id ?>" name="<?= $id ?>">
                </div>
            <?php endforeach; ?>
            <button type="submit">submit</button>
        </form>
    </div>
</main>