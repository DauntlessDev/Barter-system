<?php if (session()->getFlashdata('msg') !== null): ?>
<div>
    <p style='color: green'><?= session()->getFlashdata('msg') ?></p>
</div>
<?php endif; ?>
<?= isset($validation) ? $validation->listErrors('user_errors') : '' ?>