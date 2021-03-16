<div class="container">
    <div class="wrapper">
        <h1>Edit Item</h1>
        <div class="container_form">
            <form class="form" method="POST">
                <?= $this->include('components/partials/_itemFields') ?>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>