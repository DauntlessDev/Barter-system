<div class="wrapper">
    <div class="validation-box">
    <?= $this->include('components/partials/_feedback') ?>
    </div>
    <h1 class="main-title">Edit Item</h1>
    <form class="form" action="<?= route_to('itemProfileEdit') ?>" method="POST" id="edititem-form" enctype="multipart/form-data" >
        <?= $this->include('components/partials/_itemFields') ?>
    </form>
</div>