<?php if (!empty($errors)) : ?>
    <div>
        <ul style="color: red">
            <?php foreach ($errors as $field => $error) : ?>
                <li><?= $error ?></li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif ?>