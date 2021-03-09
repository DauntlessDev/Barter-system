<div class="wrapper">
    <div class="feature">
        <img src="<?= base_url('assets/home/feature-sample.jpg') ?>"  alt="feature" class="feature-img">
    </div>

    <div class="explore">
        <div class="explore-header">
            <p>Explore Items</p>
        </div>
        <div class="category-container">
            <?php for ($x = 1; $x <= 10; $x++) :?>
                <?= $this->include('components/home/category') ?>
            <?php endfor ?>
        </div>
    </div>

    <div class="fresh-finds">
        <div class="fresh-finds-header">
            <p>Fresh Finds</p>
        </div>
        <div class="product-list">
            <?php for($i = 0; $i<count($latestItems); $i++): ?>
                <?php $poster_info = $class->getPosterInfo($latestItems[$i]['poster_uid']);?>
                <?= view_cell('\App\Libraries\Product::getItem', ['item' => $latestItems[$i], 'poster'=>$poster_info[0]]) ?>
            <?php endfor; ?>
        </div>
        <div class="bottom-end">
            <button>View more</button>
        </div>
    </div>
</div>
