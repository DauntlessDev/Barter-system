<div class="wrapper">
    <div class="validation-box">
    <?php // more on flashdata https://codeigniter.com/user_guide/libraries/sessions.html#flashdata?>
    <?php if (session()->getFlashdata('msg') !== null): ?>
        <div>
        <p style='color: green'><?= session()->getFlashdata('msg') ?></p>
        </div>
        <?php endif; ?>
    <?php // validation https://www.codeigniter.com/user_guide/libraries/validation.html?highlight=validate#customizing-error-display ?>
    <?= isset($validation) ? $validation->listErrors('user_errors') : '' ?>
    </div>
    <h1 class="main-title">Edit Item</h1>
    <form class="form" action="<?= route_to('itemProfileEdit') ?>" method="POST" id="edititem-form" enctype="multipart/form-data" >
        <?= $this->include('components/partials/_itemFields') ?>
    </form>
</div>