<div class="wrapper">
    <div class="validation-box">
        <?= $this->include('components/partials/_feedback') ?>
    </div>
    <h1 class="main-title">What are you listing today?</h1>
    <form class="form" action="<?= route_to('itemCreate') ?>" method="POST" id="additem-form" enctype="multipart/form-data" >
        <?= $this->include('components/partials/_itemFields') ?>
    </form>
</div>